<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         // fetch all trashed  files 
         $trashedData = Blog::where('user_id',Auth::id())->onlyTrashed()->latest('deleted_at')->cursorPaginate(2);
        
         return view('blog.Admin.index')->with('postData',$trashedData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        $trashedData = Blog::where('uuid',$uuid)->onlyTrashed()->firstOrFail();
       
       
        return view('blog.Admin.show')->with('postData',$trashedData);
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
    public function update(Request $request, $uuid)
    {
        //
        Blog::withTrashed()->where('uuid',$uuid)->first()->restore();
    //    Blog::withTrashed()->find($uuid)->restore();

        return to_route('Admin.index')->with('postSuccess','Post restored successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        //  forece delete post forever

        Blog::withTrashed()->where('uuid',$uuid)->firstOrFail()->forceDelete();

        return to_route('Admin.index')->with('postSuccess','Post deleted successfully');

    }
}
