<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Sector;
use App\Spot;
use App\User;
use App\Comment;
use App\RouteImage;

class RoutesController extends Controller
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
            'ime' => 'required',
            'opis' => 'required',
            /* ostalo netreba jer smjerr moze brit projekt */
         
        ]);
        $route = new Route;
        $route->ime = $request->input('ime');
        $route->ocjena = $request->input('ocjena');
        $route->duzina = $request->input('duzina');
        $route->broj_spitova = $request->input('broj_spitova');
        $route->opis = $request->input('opis');
        $route->postavio = $request->input('postavio');
        $route->user_id = auth()->user()->id;
        $route->sector_id =  $request->input('sector_id');
        $route->save();
        return redirect('/spots')->with('success', 'smjer je kreiran');

        
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
        /* $spot = Spot::find($id); */
        $sector = Sector::find($id);
        $route = Route::find($id);
        $comments = Comment::orderBy('created_at','desc')->paginate(100);
        $route_images = RouteImage::all();
        return view('routes.show')->with('sector', $sector)->with('route', $route)->with('comments', $comments)->with('route_images', $route_images);
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
        $route = Route::find($id);
        if(auth()->user()->id !==$route->user_id){

            return redirect('/spots')->with('error', 'Pristup nije dozvoljen');
            }
        return view('routes.edit')->with('route', $route);
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
        $this->validate($request, [
            'ime' => 'required',
            'opis' => 'required',
            /* ostalo netreba jer smjerr moze brit projekt */
         
        ]);

        $route = Route::find($id);
        $route->ime = $request->input('ime');
        $route->ocjena = $request->input('ocjena');
        $route->duzina = $request->input('duzina');
        $route->broj_spitova = $request->input('broj_spitova');
        $route->opis = $request->input('opis');
        $route->postavio = $request->input('postavio');
        $route->save();
        return redirect('/spots')->with('success', 'Smjer je izmjenjen');
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
        $route = Route::find($id);
        if(auth()->user()->id !==$route->user_id){

            return redirect('/spots')->with('error', 'Pristup nije dozvoljen');
            }
        $route->delete();
        return redirect('/spots')->with('success', 'smjer je izbrisan');
    }
}
