<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;   /* ovo sam ja dodao */
use App\Spot;
use App\Sector;

class SpotsController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
        //ne treba parametre

        $spots = Spot::orderBy('ime','asc')->paginate(10);
        return view('spots.index')->with('spots', $spots);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spots.create');
        //ne treba parametre
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
            'x' => 'required',
            'y' => 'required',
        ]);

        $spot = new Spot;
        $spot->ime = $request->input('ime');
        $spot->opis = $request->input('opis');
        $spot->x = $request->input('x');
        $spot->y = $request->input('y');
        $spot->user_id = auth()->user()->id;
        $spot->save();

        return redirect('/spots')->with('success', 'Penjalište je kreirano');

        //sabmitamo iz forme pa moramo prihvatiti varijable iz forme pa nam treba request objekt(zahtjev)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $spot = Spot::find($id);
       $sectors = Sector::orderBy('ime','asc')->paginate(10);
       return view('spots.show')->with('spot', $spot)->with('sectors', $sectors);
        //ima id jer moramo znati id od spota kojeg zelimo prikazati
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spot = Spot::find($id);
        if(auth()->user()->id !==$spot->user_id){

            return redirect('/spots')->with('error', 'Pristup nije dozvoljen');
            }
        return view('spots.edit')->with('spot', $spot);

        //ima id jer moramo znati id od spota kojeg zelimo izmjeniti
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
            'x' => 'required',
            'y' => 'required',
        ]);

        $spot = Spot::find($id);
        $spot->ime = $request->input('ime');
        $spot->opis = $request->input('opis');
        $spot->x = $request->input('x');
        $spot->y = $request->input('y');
        $spot->save();

        return redirect('/spots')->with('success', 'Penjalište je izmjenjeno');
        //sabmitamo formu i moramo znati koji spot nam treba tj kojeg mjenjamo
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spot = Spot::find($id);
        if(auth()->user()->id !==$spot->user_id){

            return redirect('/spots')->with('error', 'Pristup nije dozvoljen');
            }
        $spot->delete();
        return redirect('/spots')->with('success', 'Penjalište je izbrisano');
        //ima id jer moramo znati id od spota kojeg zelimo obrisati
    }
}
