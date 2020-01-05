<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
/* use DB; */

class PostController extends Controller
{
    /** 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $posts= Post::all(); */
        /* $posts = Post::orderBy('created_at', 'desc')->take(9)->get(); */
        /* gornji take je da uzme samo 9 komada da ne lista sve postove */
        /*$posts= DB::select('SELECT * FROM posts')  */
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('posts.index')->with('posts', $posts);
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
        $this->validate($request, [
            'naslov' => 'required',
            'text' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
    //hendlanje fajlova
        if($request->hasFile('cover_image')){
            //ime slike sa ekstenzijom
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //samo ime
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //samo ekstenizija
            $extension = $request->file('cover_image')->GetClientOriginalExtension();
            //ime za spremanje
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //upolad
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'bez_slike.jpg';
        }
        //kreiranje postova
        $post = new Post;
        $post->naslov = $request->input('naslov');
        $post->text = $request->input('text');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post je kreiran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //provjera za korisnika 
        if(auth()->user()->id !==$post->user_id){

        return redirect('/posts')->with('error', 'Pristup nije dozvoljen');
        }
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'naslov' => 'required',
            'text' => 'required'
        ]);
        if($request->hasFile('cover_image')){
            //ime slike sa ekstenzijom
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //samo ime
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //samo ekstenizija
            $extension = $request->file('cover_image')->GetClientOriginalExtension();
            //ime za spremanje
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //upolad
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->naslov = $request->input('naslov');
        $post->text = $request->input('text');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post je uređen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::Find($id);
        if(auth()->user()->id !==$post->user_id){

            return redirect('/posts')->with('error', 'Pristup nije dozvoljen');
            }
        //brisanje slike
        if($post->cover_image != 'bez_slike.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

       
       
        $post->delete();
        return redirect('/posts')->with('error', 'Post je obrisan');
    }
}
