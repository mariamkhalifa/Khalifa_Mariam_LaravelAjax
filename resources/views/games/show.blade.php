@extends('layouts.app')

@section('content')
<section>
    <img src="{{ $game->imageUri }}" alt="game image">
    <h2>{{ $game->name }}</h2>
    <p>{{ $game->release_year }}</p>
    <p>Description: {{ $game->desc }}</p>
    <p>My Review: {{ $game->review }}</p>

    <div>
        <a href="{{ route('games.edit', ['game' => $game] ) }}">Edit Game</a>
        <form method="POST" action="{{ route('games.delete', ['game' => $game ] ) }}">
        @method('delete')
        @csrf  
            <button type="submit">Delete Game</button>
        </form>
    </div>
</section>
@endsection
