<?php

namespace App\Http\Controllers;

use App\Models\InfoLink;
use App\Models\Link;
use Illuminate\Http\Request;

class VisitLinkController extends Controller
{
    public function openLink($code)
    {
        $link = Link::where('new_url', $code)->firstOrFail();

        if (!$link->old_url) {
            abort(404);
        }
        $link->count = $link->count + 1;
        $link->save();
        InfoLink::create([
            'ip' => request()->ip(),
            'date_time' => now(),
            'link_id' => $link->id
        ]);

        return redirect()->away($link->old_url);
    }



}
