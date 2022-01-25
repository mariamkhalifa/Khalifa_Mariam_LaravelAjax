<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
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
        return view('games.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:225',
            'image' => 'required|image',
            'release_year' => 'required|digits:4|integer',
            'desc' => 'required',
            'review' => 'required'
        ]);

        $imageName = Storage::putFile('public', $request->image);

        $game = new Game;
        $game->name = $request->get('name');
        $game->image = $imageName;
        $game->release_year = $request->get('release_year');
        $game->desc = $request->get('desc');
        $game->review = $request->get('review');
        $game->user()->associate($request->user());

        $game->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|max:225',
            'image' => 'required|image',
            'release_year' => 'required|digits:4|integer',
            'desc' => 'required',
            'review' => 'required'
        ]);

        $imageName = Storage::putFile('public', $request->image);

        $game = new Game;
        $game->name = $request->get('name');
        $game->image = $imageName;
        $game->release_year = $request->get('release_year');
        $game->desc = $request->get('desc');
        $game->review = $request->get('review');
        $game->user()->associate($request->user());

        $game->update($request->all());

        return redirect('/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect('/home');
    }
}
