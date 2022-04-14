@extends('default')

@section('title')
    {{'Alle Oppasser'}}
@endsection

@section('content')
<button class="animalCard__button" onclick="window.location.href='/'">  Alle dieren  </button>
<button class="animalCard__button" onclick="window.location.href='/dashboard'">  Uitloggen  </button>
<ul class="u-grid-12 u-grid-gap-2">
        @foreach($sitters as $sitter)
            @include('sitter.components.sitterCard--index')
        @endforeach
    </ul>
@endsection