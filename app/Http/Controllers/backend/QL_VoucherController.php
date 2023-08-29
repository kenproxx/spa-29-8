<?php

namespace App\Http\Controllers\backend;

use App\Enum\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Product;
use App\Models\ProductVouchers;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QL_VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $listProduct = Product::query();
        $listVoucher = Voucher::query();
        $listAgency = [];

        switch ($user->role_id) {
            case UserRole::ADMIN:
                $listProduct->where('user_id', $user_id);

                $agency_id = Agency::where('user_id', $user_id)->first();
                $listVoucherOfSpa = ProductVouchers::where('agency_id', $agency_id)->pluck('voucher_id');
                $listVoucher = Voucher::whereIn('id', $listVoucherOfSpa);
                break;
            case UserRole::SUPER_ADMIN:
                $listAgency = Agency::all(['id','ten_co_so','ten_quan_ly', 'user_id']);
                break;
        }


        $listProduct = $listProduct->get(['id', 'title', 'agency_id']);
        $listVoucher = $listVoucher->get(['id', 'name', 'code', 'quantity',
            'gia_ap_dung_toi_thieu', 'phan_tram_giam', 'gia_giam_toi_thieu',
            'gia_giam_toi_da', 'begin_time', 'end_time']);

        return view('backend/pages/voucher/index', compact('listProduct', 'listVoucher', 'listAgency'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentDate = now();
        $existingVoucher = Voucher::where([
            ['code', '=', $request->input('code')],
            ['end_time', '>', $currentDate]
        ])->first();

        if ($existingVoucher) {
            return redirect()->back()->with('error', 'Mã voucher đã tồn tại trong hệ thống');
        }
        $voucher = new Voucher();

        foreach ($request->except(['_token', 'service_id']) as $key => $value) {
            $voucher->{$key} = $value;
        }
        $voucher->created_by = Auth::user()->id;

        $voucher->save();

        $this->storeProductVoucher($request->input(), $voucher->isDirty());

        return redirect()->back()->with('success', 'Tạo voucher thành công');

    }

    public function storeProductVoucher($input, $voucher_id)
    {
        $product_voucher = new ProductVouchers();
        $product_voucher->product_id = $input['product_id'];
        $product_voucher->voucher_id = $voucher_id;

        $product_voucher->created_by = Auth::user()->id;

        $product_voucher->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vouchers = Voucher::where('id', $id)->first();
        if ($vouchers) {
            $vouchers->delete();
            $vouchersP = ProductVouchers::where('voucher_id', $id)->get();
            if ($vouchersP) {
                foreach ($vouchersP as $item) {
                    $item->delete();
                }
            }
            return redirect()->back()->with('success', 'Xóa voucher thành công');
        } else {
            return redirect()->back()->with('error', 'Lỗi, thử lại');
        }
    }

    public function getProductsByAgency(Request $request) {
        $agencyId = $request->input('agency_id');

        $products = Product::where('agency_id', $agencyId)->get();

        return response()->json($products);
    }
}
