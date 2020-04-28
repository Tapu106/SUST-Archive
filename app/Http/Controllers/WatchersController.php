<?php

namespace App\Http\Controllers;
use App\Watcher;
use Auth;

use Illuminate\Http\Request;

class WatchersController extends Controller
{

    public function watch($id)
    {

        Watcher::create([

            'post_id' => $id,
            'user_id' => Auth::id()
        ]);

        return redirect()->back();
    }

    public function unwatch($id)
    {

        $watcher =  Watcher::where('post_id', $id)->where('user_id', Auth::id());


        $watcher->delete();

        return redirect()->back();
    }
}

