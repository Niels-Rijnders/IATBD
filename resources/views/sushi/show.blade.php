@extends('default')

@section('title')
    {{$animal->species . " " . $animal->name}}
@endsection

@section('content')
    @include('sushi.components.sushiCard--show')
@endsection