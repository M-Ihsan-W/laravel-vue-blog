<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function handleLogin()
    {
        if(session()->has('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')) {
            return true;
        } else {
            return false;
        }
    }

    public function dashboard() 
    {
        if($this->handleLogin()) {
            return view('admin/dashboard');
        } else {
            return redirect('/login');
        }
    }

    public function index()
    {
        return view('/admin/index');
    }

    public function posts()
    {
        if($this->handleLogin()) {
            return view('admin/posts');
        } else {
            return redirect('/login');
        }
    }

}
