<?php

namespace App\Http\Controllers;

use App\Http\Requests\CutRequest;
use App\Http\Requests\LogRequest;
use App\Http\Requests\RegRequest;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function reg(RegRequest $request)
    {
        if (!($this->sessionCheck()))
            return redirect()->route('home');

        $reg = new User();
        $reg->login = $request->input('login');
        $reg->email = $request->input('email');
        $reg->password = Hash::make($request->input('password'));
        if ($reg->save()) {
            session()->flash('flashOk', 'Регистрация прошла успешна');
        }
        return redirect()->route('log')->withInput();
    }
    public function log(LogRequest $request)
    {
        if (!($this->sessionCheck()))
            return redirect()->route('home');

        $user = User::where('login', $request->login)->first();
        if (!Hash::check($request->password, $user->password)) {
            session()->flash('flashErr', 'Неправильный логин или пароль');
            return redirect()->route('log')->withInput();
        }
        session()->put('id',$user->id);
        session()->put('login',$user->login);
        return redirect()->route('home');
    }

    public function linkCut(CutRequest $request)
    {
        if($this->sessionCheck()) return redirect()->route('log');

        $createLink = bit(random_bytes(25))

        $link = new Link();
        $link->old_url = $request->input('old_url');
    }

    public function sessionCheck()
    {
        if (session('id')) {
            return false;
        }
        return true;
    }
}
