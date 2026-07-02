<?php

namespace App\Http\Controllers;

use App\Models\InfoLink;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicController extends Controller
{
    public function home()
    {
        if (!auth()->check())
            return redirect()->route('login');


        return view('layouts.home');
    }
    public function links()
    {
        if (!auth()->check())
            return redirect()->route('login');

        $links = Link::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('layouts.links', compact('links'));
    }

    public function linkOpen($id)
    {
        if (!auth()->check())
            return redirect()->route('login');

        if(!Link::where('id', $id)->where('user_id', auth()->id())->exists()){
            session()->flash('flashErr', 'Ссылки не существует');
            return redirect()->route('links');
        }

        $infoLinks = InfoLink::where('link_id', $id)
        ->orderBy('id', 'desc')
        ->paginate(15);

        return view('layouts.info', compact('infoLinks'));
    }


    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
    public function log()
    {
        if (auth()->check())
            return redirect()->route('home');


        return view('login.log');
    }

    public function reg()
    {
        if (auth()->check())
            return redirect()->route('home');


        return view('login.reg');
    }

}
