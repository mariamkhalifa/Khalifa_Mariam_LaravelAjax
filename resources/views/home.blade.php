@extends('layouts.app')

@section('content')
<section>
    <h2 class="hidden">Home Page</h2>

    <div id="welcome">
        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        Hello, {{ Auth::user()->name }}!
    </div>
    
    <section id="wallCon" class="container">
        <h3 class="headline">Wall Messages</h3>

        <section id="newMessageCon">
            <h2>Post A New Wall Message</h2>

            <form method="POST" action="{{ route('chats.store') }}" enctype="multipart/form-data">
            @csrf

                <label for="text">Message:</label>
                <textarea id="text" name="text" col="3" row="11"></textarea>

                <button type="submit">Post</button>

            </form>
        </section>

        <ul>
            @foreach($chats as $chat)
            <li class="messageCard">
                <p class="messageName">{{ $chat->user->name }}</p>
                <p class="messageText">{{ $chat->text }}</p>
                <p class="messageTime">at {{ $chat->created_at }}</p>
                @if(Auth::user()->id === $chat->user->id)
                <form method="POST" action="{{ route('chats.delete', ['chat' => $chat] ) }}">
                    @csrf
                    @method('delete')
                    <input class="messageDelete" type="submit" value="delete">
                </form>
                @endif
            </li>
            @endforeach
        </ul>

        
    </section>

    <section id="gamesCon" class="container">
        <h3 class="headline">My Games</h3>

        <ul>
            @foreach($games as $game)
            <li class="gameCard"><a href="{{ route('games.show', ['game' => $game] ) }}">
                <img class="gameImg" src="{{ $game->imageUri }}" alt="game image">
                <p class="gameName">{{ $game->name }}</p>
                <p class="gameYear">{{ $game->release_year }}</p>
            </a></li>
            @endforeach
        </ul>


        <a id="gameAdd" href="{{ route('games.add') }}"><div>+</div>Add Game</a>
    </section>

    <section id="searchCon" class="container">
        <h2>Search All Games</h2>
        <p>You may search for all games added by all users. Check what other fans think about MGS games.</p>
       
        <form id="searchForm">
            <label for="search">Search</label>
            <input id="search" name="search" type="text">
        </form>
        
        <ul id="searchResults">Search Results will display here...</ul>

</section>
@endsection
