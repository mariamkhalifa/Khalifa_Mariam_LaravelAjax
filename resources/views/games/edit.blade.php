@extends('layouts.app')

@section('content')
<section>
    <h2>Edit Game</h2>

    @if($errors->any())
        @foreach($errors->all() as $error)

        <p>{{ $error }} </p>

        @endforeach
    @endif

    <form method="POST" action="{{ route('games.update', ['game' => $game] ) }}" enctype="multipart/form-data">
    @csrf
    @method('put')

        <label for="name">Name:</label>
        <input id="name" name="name" type="text" value="{{ $game->name }}">

        <label for="image">Image:</label>
        <input id="image" name="image" type="file">

        <label for="release_year">Release Year:</label>
        <input id="release_year" name="release_year" type="number" value="{{ $game->release_year }}">

        <label for="desc">Description:</label>
        <textarea id="desc" name="desc" col="3" row="11"></textarea>

        <label for="review">What you thought about it:</label>
        <textarea id="review" name="review" col="3" row="11"></textarea>

        <button type="submit">Edit Game</button>

    </form>
</section>
@endsection
