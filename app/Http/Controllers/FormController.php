<?php

namespace App\Http\Controllers;

use App\Http\Requests\CutRequest;
use App\Http\Requests\LinkDelRequest;
use App\Http\Requests\LinkOpenRequest;
use App\Http\Requests\LogRequest;
use App\Http\Requests\RegRequest;
use App\Models\InfoLink;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function reg(RegRequest $request)
    {
        if (auth()->check())
            return redirect()->route('home');

        $user = User::create([
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        auth()->login($user);
        return redirect()->route('home');
    }
    public function log(LogRequest $request)
    {
        if (auth()->check())
            return redirect()->route('home');

        $login = [
            'login' => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            session()->regenerate();
            return redirect()->route('home');
        }

        session()->flash('flashErr', 'Неправильный логин или пароль');
        return redirect()->route('login')->withInput();
    }

    public function linkCut(CutRequest $request)
    {
        if (!auth()->check())
            return redirect()->route('login');

        $newUrl = $this->createLink();
        $newFullUrl = url('/') . '/' . $newUrl;


        Link::create([
            'old_url' => $request->input('old_url'),
            'new_url' => $newUrl,
            'user_id' => auth()->id(),
        ]);

        session()->flash('flashOk', $newFullUrl);
        return redirect()->route('home')->withInput();
    }

    public function createLink()
    {
        do {
            $createLink = bin2hex(random_bytes(8));
        } while (Link::where('new_url', $createLink)->exists());

        return $createLink;
    }

    public function linkDel(LinkDelRequest $request)
    {
        if (!auth()->check())
            return redirect()->route('login');

        Link::where('id', $request->link_del)
            ->where('user_id', auth()->id())
            ->delete();

        session()->flash('flashOk', 'Ссылка удалена ;)');
        return redirect()->route('links');
    }
    
}
