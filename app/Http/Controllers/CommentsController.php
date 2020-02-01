<?php

namespace App\Http\Controllers;
use App\Sector;
use App\Spot;
use App\Route;
use App\User;
use App\Comment;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['show']]);
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
         $this->validate($request, [
            'comment' => 'required',

         
        ]);
        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->user_id = auth()->user()->id;
        $comment->route_id =  $request->input('route_id');
        $comment->save();
        return back();
        /* return redirect('/routes/$request->route_id')->with('success', 'komentar je dodan'); */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $comment = Comment::find($id);
        if(auth()->user()->id !==$comment->user_id){

            return back()->with('error', 'Pristup nije dozvoljen');
            }
        $comment->delete();
        return back()->with('success', 'smjer je izbrisan');
    }
    
}
