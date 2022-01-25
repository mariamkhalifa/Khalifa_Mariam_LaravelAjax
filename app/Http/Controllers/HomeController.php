<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Chat;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $games = Game::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $chats = Chat::orderBy('created_at', 'desc')->get();

        return view('home', compact('games', 'chats'));
    }
}
