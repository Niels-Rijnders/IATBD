@extends('default')

@section('title')
    {{'Alle dieren'}}
@endsection

@section('content')
@include('animal.components.filter--index')
<button class="animalCard__button" onclick="window.location.href='/animal/create'">   Dier toevoegen  </button>
<button class="animalCard__button" onclick="window.location.href='/animal/delete'">   Dier verwijderen  </button>
<button class="animalCard__button" onclick="window.location.href='/'">  Alle dieren  </button>
<button class="animalCard__button" onclick="window.location.href='/dashboard'">  Uitloggen  </button>
    <ul class="u-grid-12 u-grid-gap-2">
        @foreach($animals as $animal)
            @include('animal.components.animalCard--ownerIndex')
        @endforeach
    </ul>
@endsection