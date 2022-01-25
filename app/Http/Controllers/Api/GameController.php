<?php

namespace App\Http\Controllers\Api;

use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();
        return response()->json($games);
    }

    public function search(Request $request) {
        $query = $request->input('search') . '%';
        $searchedGames = Game::where('name', 'LIKE', $query)->get();
        
        return response()->json($searchedGames);
    }
}
