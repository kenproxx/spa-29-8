<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\MoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoreServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDaiLy = Agency::all();
        $listService = MoreService::get(['id', 'service_name', 'agencys_id']);
        return view('backend/pages/dich_vu_them/index', compact('listDaiLy', 'listService'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getAllByAgency($agency_id)
    {
        $listService = MoreService::where('agencys_id', $agency_id)->get(['id', 'service_name']);
        return response()->json($listService);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        $user_id = Auth::user()->id;
        if (!$id) {
            $service = new MoreService();
            $service->created_by = $user_id;
            $msg = 'Tạo dịch vụ thành công';
        } else {
            $service = MoreService::where('id', $id)->first();
            $service->updated_by = $user_id;
            $msg = 'Sửa dịch vụ thành công';
        }
        $arrInput = $request->input();
        foreach ($request->except(['_token', 'id']) as $key => $value) {
            $service->{$key} = $arrInput[$key];
        }

        $service->save();

        return redirect()->back()->with('success', $msg);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = MoreService::where('id', $id)->first(['id', 'gia_goc', 'gia_khuyen_mai', 'service_name', 'agencys_id']);
        return response()->json($service);
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
        $service = MoreService::where('id', $id)->first();
        if ($service) {
            $service->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        }
        return redirect()->back()->with('success', 'Lỗi, xin thử lại');
    }
}
