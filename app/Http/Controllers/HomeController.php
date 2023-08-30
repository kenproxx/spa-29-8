<?php

namespace App\Http\Controllers;

use App\Enum\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function sendMail()
    {
        (new SendMailController())->sendEmail('ngodaix5tp@gmail.com', 'abc123@gmail.com', 'Alooo', 'Hello World');
    }


    public function checkAdminRole()
    {
        $isAdmin = false;
        $userRole = Auth::user()->role_id;
        if ($userRole == UserRole::ADMIN || $userRole == UserRole::SUPER_ADMIN) {
            $isAdmin = true;
        }
        return $isAdmin;
    }

    public function checkGuestRole()
    {
        $isGuest = false;
        $userRole = Auth::user()->role_id;
        if ($userRole == UserRole::GUEST) {
            $isGuest = true;
        }
        return $isGuest;
    }
}
