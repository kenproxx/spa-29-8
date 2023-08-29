<?php

namespace App\Http\Controllers\backend;

use App\Enum\UserRole;
use App\Enum\UserStatus;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Prologue\Alerts\Facades\Alert;
use SebastianBergmann\Diff\Exception;

class QL_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listRole = Role::all(['id', 'name']);
        $listUser = User::all(['id', 'name', 'number_phone', 'email', 'kakao_talk_id', 'role_id', 'avatar', 'status']);
        $listSpa = Agency::where('user_id', '')->get(['id', 'ten_co_so', 'nganh_nghe']);
        return view('backend/pages/quan_ly_user/index', compact('listRole', 'listUser', 'listSpa'));
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
        try {

            $existingUser = User::where('email', $request->input('email'))->first();

            if ($existingUser) {
                return redirect()->back()->with('error', 'Địa chỉ email đã tồn tại.');
            }

            $user = new User();

            $isAdminSpa = false;
            $spaId = '';
            foreach ($request->except('_token') as $key => $value) {
                switch ($key) {
                    case 'password':
                        $user->{$key} = Hash::make($value);
                        break;
                    case 'spa_id':
                        if ($value != 0) {
                            $isAdminSpa = true;
                            $spaId = $value;
                        }
                        break;
                    default:
                        $user->{$key} = $value;
                }
            }

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarPath = $avatar->store('images', 'public');
                $user->avatar = $avatarPath;
            }

            $user->status = UserStatus::ACTIVE;

            $result = $user->save();

            if ($isAdminSpa) {
                $agency = Agency::where('id', $spaId)->first();
                $agency->user_id = $user->id;
                $agency->save();
            }

            if ($result) {
                return redirect()->route('backend.user.show')->with('success', 'Tạo mới thành công');
            }
            return redirect()->back()->with('error', 'Lỗi thông tin');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Lỗi thao tác');
        }
    }


    /**
     * Display the specified resource.
     */
    public
    function show(string $id)
    {
        try {
            $user = User::where('id', $id)->first(['id', 'name', 'number_phone', 'email', 'kakao_talk_id', 'zalo_id', 'role_id', 'password']);
            return response()->json($user);
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, string $id)
    {
        try {
            $user = User::where('id', $id)->first();
            $isAdminSpa = false;
            $spaId = '';
            foreach ($request->except('_token') as $key => $value) {
                switch ($key) {
                    case 'password':
                        if ($value) {
                            $user->{$key} = Hash::make($value);
                        }
                        break;
                    case 'spa_id':
                        if ($value != 0) {
                            $isAdminSpa = true;
                            $spaId = $value;
                        }
                        break;
                    default:
                        $user->{$key} = $value;
                }
            }

            $result = $user->save();

            if ($isAdminSpa) {
                $agency = Agency::where('id', $spaId)->first();
                $agency->user_id = $user->id;
                $agency->save();
            }

            if ($result) {
                if ($id == Auth::user()->id && $user->role_id != UserRole::SUPER_ADMIN) {
                    return (new AuthController())->logout();
                }
                return redirect()->route('backend.user.show')->with('success', 'Sửa thành công');
            }
            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Lỗi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($id == Auth::user()->id) {
            return redirect()->back()->with('error', 'Bạn không thể khóa chính mình =))');
        }
        $user = User::where('id', $id)->first();
        if ($user) {
            switch ($user->status) {
                case UserStatus::ACTIVE:
                    $user->status = UserStatus::INACTIVE;
                    $msg = 'Khóa tài khoản thành công';
                    break;
                default:
                    $user->status = UserStatus::ACTIVE;
                    $msg = 'Mở khóa tài khoản thành công';
                    break;
            }
            $user->save();
            return redirect()->back()->with('success', $msg);
        } else {
            return redirect()->back()->with('error', 'Lỗi, xin thử lại');
        }

    }
}
