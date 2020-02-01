<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spot;

class PagesController extends Controller
{
    public function index(){
        $title = 'CroCrimp';
        // ovaj title gore mogu pozvati u blade-u return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
 /*    public function about(){
        $title = 'about us';
        return view('pages.about')->with('title', $title);
    } ovo obriši netreba about *
    /* public function penjalista(){
        $title = 'Penjališta';
        return view('pages.penjalista')->with('title', $title); */
        /*   obriši ovo jer vučeš iz spots index taj dio
        $data = array(
            'title' => 'Penjalista',
            'penjalista' => ['zima', 'ljeto']
        ); 
        return view('pages.penjalista')->with($data); */
    
};      
