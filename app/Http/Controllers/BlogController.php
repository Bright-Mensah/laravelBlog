<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all post by the authenticated user and display it on the dashboard
        $postData = Blog::where('user_id',Auth::user()->id)->latest('updated_at')->paginate(3);
        
        return view('blog.Admin.index')->with('postData',$postData);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('blog.Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request first
        $request->validate([
            'title'=>'required|max:120','description'=>'max:120','content'=>'required'
        ]);

        // if theres no error then save the post data in the db 

        Blog::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'uuid'=>Str::uuid(),
        ]);

        return to_route('Admin.index')->with('postSuccess','Post added successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        // show post data with the uuid

        $postData = Blog::where('uuid',$uuid)->firstOrFail();

        return view('blog.Admin.show',['data'=>$postData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $postData = Blog::where('uuid',$uuid)->firstOrFail();


        return view('blog.Admin.edit')->with('data',$postData);
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
        // validate request first

        $request->validate([
            'title'=>'required|max:120',
            'description'=>'max:120',
            'content'=>'required'
        ]);

         Blog::where('uuid',$uuid)->firstOrFail()->update($request->all());

        $postData = Blog::where('uuid',$uuid)->first();

        $id = $postData->uuid;

        

        return to_route('Admin.show',$id)->with('updateSuccess','Post updated successfully');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        //send post to trash
        Blog::where('uuid',$uuid)->firstOrFail()->delete();

        return to_route('Admin.index')->with('updateSuccess','Post deleted successfully');
    }
}
