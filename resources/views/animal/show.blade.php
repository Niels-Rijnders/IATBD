@extends('default')

@section('title')
    {{$animal->species . " " . $animal->name}}
@endsection

@section('content')
    @include('animal.components.animalCard--show')
@endsection