@extends('default')

@section('title')
 {{"Alle dieren"}}
@endsection

@section('content')
@include('animal.components.checkbox--index')
<button class="animalCard__button" onclick="window.location.href='/owners'">  Alle eigenaren  </button>
<button class="animalCard__button" onclick="window.location.href='/sitters'">  Alle oppassers  </button>
<button class="animalCard__button" onclick="window.location.href='/application'">  Op dier passen  </button>
<button class="animalCard__button" onclick="window.location.href='/dashboard'">  Uitloggen  </button>
    <ul class="u-grid-12 u-grid-gap-2">
        @foreach($animal as $animal)
            @include('animal.components.animalCard--index')
        @endforeach
    </ul>
@endsection