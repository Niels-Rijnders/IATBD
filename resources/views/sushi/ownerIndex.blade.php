@extends('default')

@section('title')
    {{'Alle dieren'}}
@endsection

@section('content')
@include('sushi.components.filter--index')
<button class="sushiCard__button" onclick="window.location.href='/sushi/create'">   Dier toevoegen  </button>
<button class="sushiCard__button" onclick="window.location.href='/sushi/delete'">   Dier verwijderen  </button>
<button class="sushiCard__button" onclick="window.location.href='/'">  Alle dieren  </button>
<button class="sushiCard__button" onclick="window.location.href='/dashboard'">  Uitloggen  </button>
    <ul class="u-grid-12 u-grid-gap-2">
        @foreach($animals as $animal)
            @include('sushi.components.animalCard--ownerIndex')
        @endforeach
    </ul>
@endsection