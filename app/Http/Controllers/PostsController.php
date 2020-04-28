<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Reply;
use App\User;
use Auth;
use Notification;
use Session;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    // public $best_answer;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $categories = Category::all();

            Session::flash('info', 'you must choose a category');
            if($categories->count()==0){
                return redirect()->back();
            }

        return view('posts.creater')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $user->Auth::user();
            

        $this->validate($request,[
            'title' =>'required|max:255',
            'content' =>'required',
            'category_id' => 'required',

        ]);

        $post= Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title)
        ]);
        Session::put('message','Post added successfully  !!!');
         return redirect()->back();
    }

   
    public function shro($slug)
    {
        
        // $pst= Post::where('slug',$slug)->first();
       // $pst= Post::where('slug',$slug)->with(['user1'])->first();
        // return view('posts.show')->with('p', $pst);
        // return view('posts.show')->with('pst');
       // return view('posts.show', ['p' => $pst]);
       $post = Post::where("slug", $slug)->first();

        // $best=2;
        
       if(!$post){
        //  abort(404);
        return view('posts.creater')->with('categories',Category::all());
       }
    //    if(!$best)
    //    {
           $best_answer = $post->replies()->where('best_answer',1)->first();
        // return view('posts.creater')->with('categories',Category::all());
    //    }
       return view('posts.show')->with('post', $post)->with('best_answer',$best_answer);
    }

    

   
    public function reply($id)
    {
        $post= Post::find($id);
       

        $reply = Reply::create([
            'user_id'=> Auth::id(),
            'post_id' => $id,
            'content' => request()->reply


        ]);

        

        $watchers = array();

        foreach($post->watchers as $watcher):

            array_push($watchers, User::find($watcher->user_id));


        endforeach;




        Notification::send($watchers, new \App\Notifications\NewReplyAdded($post));


       

        return redirect()->back(); 

    }

    public function destroy($id)
    {
        $post=Post::find($id);

        $post->delete();

        Session::flash('success', 'You successfully deleted the category');

        return redirect()->route('home');

    }
}
