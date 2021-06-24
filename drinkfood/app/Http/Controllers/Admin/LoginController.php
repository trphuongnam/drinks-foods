<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.pages.login');
    }

    public function store(LoginAdminRequest $request)
    {
        $check_login = Auth::attempt(['email' => $request->email, 'password' => $request->password, 'type' => config('enums.userTypes.admin')], $request->remember);
        if($check_login == true) return redirect()->route('admin.dashboard');
        else return redirect()->route('login.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
