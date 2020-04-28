<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\File;
use Auth;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class filesController extends Controller
{
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

        return view('add_file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $use = Auth::user();

        $this->validate($request,[
            'file_description' =>'required',
            'department_id' => 'required',
            'session_id' => 'required',
            'semester_id' => 'required',
            'course_id' => 'required',  
                    

        ]);

        $file = $request->file('file_any');
        $name= $file->getClientOriginalName();
        $extension= $file->getClientOriginalExtension();
        $size = $file->getSize();
        $newName= $name . '.' . $extension;
        $path= Storage::putFileAs('public',$request->file('file_any'),$name);
        
        $file= File::create([
            
            'file_name'=> $name,
            'file_path' => $path,
            'file_description' => $request->file_description,
            'department_id' => $request->department_id,
            'session_id' => $request->session_id,
            'semester_id'=> $request->semester_id,
            'user_name' => $use->name,
            'course_id' => $request->course_id,
            'file_ext' => $extension,
            'file_size' => $size
        ]);

        $use->points +=25;
        $use->save();
        Session::put('message','File added successfully  !!!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course_id)
    {
        
        $file=DB::table('files')
                ->join('course','files.course_id','=','course.course_id')
                ->where('course.course_id',$course_id)
                ->get();

        $all_file=view('show_filess')->with('file',$file);
        return view('layouts.app')->with('show_filess',$all_file);

    }

    public function download($file_name)
    {
        // $d= File::find($file_id);
        // return Storage::download( $d->file_path, $d->file_name );


        $file = Storage::disk('public')->get($file_name);
        return response()->download(storage_path("app/public/{$file_name}"));

    }

    public function inactive($file_id)
    {
        $us= File::find($file_id);
        DB::table('files')
    			->where('file_id',$file_id)
                ->update(['uploaded_file_status' => 1]);
                

        // $us->user->id->points -=10;
        // $us->user->save();
    			Session::put('message','product unactive successfully  !!!');
    			return redirect()->back();
    }

    public function active($file_id)
    {
        DB::table('files')
    			->where('file_id',$file_id)
    			->update(['uploaded_file_status' => 0]);
    			Session::put('message','product active successfully  !!!');
    			return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

   
}
