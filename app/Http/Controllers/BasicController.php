<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function home()
    {
        if($this->sessionCheck()) return redirect()->route('log');


        return view('layouts.home');
    }

        public function loguot()
    {
        session()->flush();

        return redirect()->route('log');
    }
    public function log()
    {
        if(!($this->sessionCheck())) return redirect()->route('home');


        return view('login.log');
    }

    public function reg()
    {
        if(!($this->sessionCheck())) return redirect()->route('home');


        return view('login.reg');
    }

    public function sessionCheck()
    {
        if (session('id')) {
            return false;
        }
        return true;
    }
}
