@extends('layouts.app')

@section('content')
<section id="gameDetails" class="container">
    <img src="{{ $game->imageUri }}" alt="game image">
    <h2>{{ $game->name }}</h2>
    <p>{{ $game->release_year }}</p>
    <p><span>Description:</span> {{ $game->desc }}</p>
    <p><span>My Review:</span> {{ $game->review }}</p>

    <div id="btnCon">
        <a class="editBtn" href="{{ route('games.edit', ['game' => $game] ) }}">Edit Game</a>
        <form method="POST" action="{{ route('games.delete', ['game' => $game ] ) }}">
        @method('delete')
        @csrf  
            <button class="deleteBtn" type="submit">Delete Game</button>
        </form>
    </div>
</section>
@endsection
