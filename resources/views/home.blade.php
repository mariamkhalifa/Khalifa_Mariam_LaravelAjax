@extends('layouts.app')

@section('content')
<section>
    <h2>Home Page</h2>

    <div>
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
    
    <section>
        <h3>Wall Messages</h3>

        <ul>
            @foreach($chats as $chat)
            <li>
                <p>{{ $chat->user->name }}</p>
                <p>{{ $chat->text }}</p>
                <form method="POST" action="{{ route('chats.delete', ['chat' => $chat] ) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete">
                </form>
            </li>
            @endforeach
        </ul>

        <section>
            <h2>Add New Chat Message</h2>

            <form method="POST" action="{{ route('chats.store') }}" enctype="multipart/form-data">
            @csrf

                <label for="text">Message:</label>
                <textarea id="text" name="text" col="3" row="11"></textarea>

                <button type="submit">Post</button>

            </form>
        </section>
    </section>

    <section>
        <h3>My Games</h3>

        <ul>
            @foreach($games as $game)
            <li><a href="{{ route('games.show', ['game' => $game] ) }}">
                <img src="{{ $game->imageUri }}" alt="game image">
                <p>{{ $game->name }}</p>
                <p>{{ $game->release_year }}</p>
            </a></li>
            @endforeach
        </ul>


        <a href="{{ route('games.add') }}"><div>+</div>Add Game</a>
    </section>

    <section>
        <h2>Search All Games</h2>
        <p>You may search for all games added by all users. Check what other fans think about MGS games.</p>
       
        <form>
            <label for="search">Search</label>
            <input id="search" name="search" type="text">
        </form>
        
        <ul id="searchResuts"></ul>

</section>
@endsection
