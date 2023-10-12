<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
