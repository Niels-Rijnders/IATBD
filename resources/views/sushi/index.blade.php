@extends('default')

@section('title')
 {{"Alle dieren"}}
@endsection

@section('content')
@include('sushi.components.checkbox--index')
<button class="sushiCard__button" onclick="window.location.href='/owners'">  Alle eigenaren  </button>
<button class="sushiCard__button" onclick="window.location.href='/sitters'">  Alle oppassers  </button>
<button class="sushiCard__button" onclick="window.location.href='/application'">  Op dier passen  </button>
<button class="sushiCard__button" onclick="window.location.href='/dashboard'">  Uitloggen  </button>
    <ul class="u-grid-12 u-grid-gap-2">
        @foreach($animal as $animal)
            @include('sushi.components.sushiCard--index')
        @endforeach
    </ul>
@endsection