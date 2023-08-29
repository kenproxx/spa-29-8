<?php

namespace App\Http\Controllers\backend;

use App\Enum\AgencyStatus;
use App\Enum\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Exception;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDaiLy = Agency::where('status', 1)->get(['id', 'ten_co_so', 'ten_quan_ly', 'status']);
        return view('backend/pages/dai_ly/index', compact('listDaiLy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend/pages/dai_ly/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->input());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $agency = Agency::where('id', $id)->first();
            if ($agency) {
                return view('backend.pages.dai_ly.modal-info-dai-ly', compact('agency'));
            }
            return back()->with('error', 'Lỗi, thử lại');
        } catch (\Exception $exception) {

        }
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
        try {
            $agency = Agency::where('id', $id)->first();
            foreach ($request->except('_token') as $key => $value) {
                $agency->{$key} = $value;
            }

            $result = $agency->save();
            return redirect()->route('backend.dai-ly.index')->with('success', 'Sửa thành công');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Lỗi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $agency = Agency::where('id', $id)->first();

            if ($agency) {
                $agency->status = AgencyStatus::DELETED;
                if ($agency->user_id) {
                    $user = User::where('id', $agency->user_id)->first();
                    if ($user) {
                        $user->status = UserStatus::DELETED;
                    }
                }
                return redirect()->route('backend.dai-ly.index')->with('success', 'Đã khóa');
            }
            return redirect()->back()->with('error', 'Lỗi, thử lại');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Lỗi');
        }
    }

    public function getAgencyByUserIdAndSpaNoAdmin($id)
    {
        $agency_user = Agency::whereIn('user_id', [$id, ''])->get();
        if ($agency_user) {
            return response()->json($agency_user);
        }
        return response()->json('');
    }

    public function getListAgencyNoAdmin()
    {
        $listSpa = Agency::where('user_id', '')->get(['id', 'ten_co_so', 'nganh_nghe']);
        if ($listSpa) {
            return response()->json($listSpa);
        }
        return response()->json('');
    }
}
