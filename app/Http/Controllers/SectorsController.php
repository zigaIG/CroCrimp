<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use App\Sector;
use App\Spot;
use App\Route;


class SectorsController extends Controller
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
        //index mi netreba jer mi je index show od spotova s tim da sam u controller
        //s tim da sam u kontroler dodao model i u show dohvatio podatke od spotova
      /*   $spots = Spot::all();
        $sectors = Sector::orderBy('ime','asc')->paginate(10);
        return view('sectors.index')->with('spots', $spots)->with('sectors', $sectors); */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /*  return view('sectors.create'); create je u spots show*/
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
            'ime' => 'required',
            'opis' => 'required',
         
        ]);
        
        $sector = new Sector;
        $sector->ime = $request->input('ime');
        $sector->opis = $request->input('opis');
        $sector->user_id = auth()->user()->id;
        $sector->spot_id =  $request->input('id_penj');/* ovo vucem iz forme sa hidden jer u show spot iam spot id a tamo se nalazi create sector */
        $sector->save();
        return redirect('/spots')->with('success', 'Sektor je kreiran');

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
        $spot = Spot::find($id);
        $sector = Sector::find($id);
        $routes = Route::orderBy('ime','asc')->paginate(10);
        return view('sectors.show')->with('sector', $sector)->with('spot', $spot)->with('routes', $routes);
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
        $sector = Sector::find($id);
        if(auth()->user()->id !==$sector->user_id){

            return redirect('/spots')->with('error', 'Pristup nije dozvoljen');
            }
        return view('sectors.edit')->with('sector', $sector);
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
            'ime' => 'required',
            'opis' => 'required',
         
        ]);
        
        $sector = Sector::find($id);
        $sector->ime = $request->input('ime');
        $sector->opis = $request->input('opis');
        $sector->save();
        return redirect('/spots')->with('success', 'Sektor je izmjenjen');
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
        $sector = Sector::find($id);
        if(auth()->user()->id !==$sector->user_id){

            return redirect('/spots')->with('error', 'Pristup nije dozvoljen');
            }
        $sector->delete();
        return redirect('/spots')->with('success', 'sektor je izbrisan');
    }
}
