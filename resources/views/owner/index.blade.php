@extends('default')

@section('title')
    {{'Alle baasjes'}}
@endsection

@section('content')
    <button class="sushiCard__button" onclick="window.location.href='/'">  Alle dieren  </button>
    <button class="sushiCard__button" onclick="window.location.href='/dashboard'">  Uitloggen  </button>
    <ul class="u-grid-12 u-grid-gap-2">
        @foreach($owners as $owner)
            @include('owner.components.ownerCard--index')
        @endforeach
    </ul>
@endsection