<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Spot;
use App\Sector;
use App\Route;
use App\Comment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('posts', $user->posts)->with('spots', $user->spots)->with('sectors', $user->sectors)->with('routes', $user->routes)->with('comments', $user->comments);
/*         return view('home')->with('spots', $user->spots); */
    }

}
