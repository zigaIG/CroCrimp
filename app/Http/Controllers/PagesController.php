<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'wtcc';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }
    public function about(){
        $title = 'about us';
        return view('pages.about')->with('title', $title);
    }
    public function penjalista(){
        $data = array(
            'title' => 'Penjalista',
            'penjalista' => ['zima', 'ljeto']
        );
        return view('pages.penjalista')->with($data);
    }
};      
