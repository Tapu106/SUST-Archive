<?php

namespace App\Http\Controllers;
use App\Reply;
use App\Like;
use Auth;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id)
    {
        $reply = Reply::find($id);


        Like::create([
            'reply_id'  => $id,
            'user_id' => Auth::id()

        ]);


        return redirect()->back();

    }

    public function unlike($id)
    {
        $like =  Like::where('reply_id', $id)->where('user_id', Auth::id())->first();


        $like->delete();

        return redirect()->back();

    }

    public function best_answer($id)
    {
        $reply= Reply::find($id);
        $reply->best_answer=1;
        $reply->save();

        $reply->user->points +=50;
        $reply->user->save();

        return redirect()->back();
    }
}
