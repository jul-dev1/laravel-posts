<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{ 
    
    public function __construct()
    {
        $this-> middleware('auth')->only("create");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::paginate(10);
        // $posts= Post::orderBy('title','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        //handle the file upload
        if($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            // get just file name
            $fileName=pathinfo($filenameWithExt,PATHINFO_FILENAME );
            //get just ext
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$fileName.'_'. time().'.'.$extension;
            //upload image
            // $path =$request->file('cover_image')->storeAs('public/storage/cover_image',$fileNameToStore);
            $path =$request->cover_image->move(public_path('storage\cover_image'), $fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpeg';
        }
        $post= new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
        $post->cover_image=$fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success','Post created.');
        //or(same)
        // $data=request()->validate([
        //     'title'=>'required',
        //     'body'=>'required'
        // ]);
        // Post::create($data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts= Post::find($id);
        return view('posts.show')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts= Post::find($id);
        if(auth()->user()->id!=$posts->user_id){
            return redirect('./posts')->with('error','Unauthorized page');
        }
        return view('posts.edit')->with('posts',$posts);
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
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        $posts= Post::find($id);

        //handle the file upload
        if($request->hasFile('cover_image')){
            //chech if the post have image , if yes delete it and update it with the new from the request
            if($posts->cover_image&&$posts->cover_image!='noimage.jpeg'){
                    //  the storage:: delete dont work now ....i delete with unlink now
                    //  Storage::delete('storage/cover_image/'.$posts->cover_image); 
                    unlink('storage/cover_image/'.$posts->cover_image);


            }
            //get filename with extension
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            // get just file name
            $fileName=pathinfo($filenameWithExt,PATHINFO_FILENAME );
            //get just ext
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$fileName.'_'. time().'.'.$extension;
            //upload image
            $path =$request->cover_image->move(public_path('storage\cover_image'), $fileNameToStore);
        }
        $post=  Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image=$fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post edeted.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts= Post::find($id);
        if(auth()->user()->id!=$posts->user_id){
            return redirect('./posts')->with('error','Unauthorized page');
        }
        if($posts->cover_image!='noimage.jpeg'){
            // Storage::delete('cover_image/'.$posts->cover_image);
            unlink('storage/cover_image/'.$posts->cover_image);


        }
        $posts->delete();
        return redirect('/posts')->with('success','Post deleted.');

        
    }
}
