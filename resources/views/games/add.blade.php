@extends('layouts.app')

@section('content')
<section>
    <h2>Add New Game</h2>

    <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
    @csrf

        <label for="name">Name:</label>
        <input id="name" name="name" type="text">

        <label for="image">Image:</label>
        <input id="image" name="image" type="file">

        <label for="release_year">Release Year:</label>
        <input id="release_year" name="release_year" type="number">

        <label for="desc">Description:</label>
        <textarea id="desc" name="desc" col="3" row="11"></textarea>

        <label for="review">What you thought about it:</label>
        <textarea id="review" name="review" col="3" row="11"></textarea>

        <button type="submit">Add Game</button>

    </form>
</section>
@endsection
