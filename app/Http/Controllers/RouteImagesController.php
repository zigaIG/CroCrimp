<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RouteImage;
use App\Route;
use App\User;

class RouteImagesController extends Controller
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
            'route_image' => 'required',
            'route_image' => 'image|max:1999',]);
        ///
        if($request->hasFile('route_image')){
            //ime slike sa ekstenzijom
            $filenameWithExt = $request->file('route_image')->getClientOriginalName();
            //samo ime
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //samo ekstenizija
            $extension = $request->file('route_image')->GetClientOriginalExtension();
            //ime za spremanje
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            //upolad
            $path = $request->file('route_image')->storeAs('public/route_images', $fileNameToStore);
        } else {
            return back()->with('error', 'niste odabrali sliku');;
        }


        $route_image = new RouteImage;
        $route_image->route_image = $fileNameToStore;
        $route_image->route_id =  $request->input('route_id');
        $route_image->user_id = auth()->user()->id;
        $route_image->save();
        return back()->with('success', 'slika je dodana');
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
         //
         $RouteImage = RouteImage::find($id);
         if(auth()->user()->id !==$RouteImage->user_id){
 
             return redirect('/spots')->with('error', 'Pristup nije dozvoljen');
             }
            $RouteImage->delete();
         return back()->with('success', 'slika smjera je izbrisana');
     }
    }

