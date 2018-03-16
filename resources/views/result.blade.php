@extends('layouts.base')

@section('content')

        <h1> Find your shortened URL Below :</h1>

        <a href="{{ config('app.url') }}/{{ $shortened }}">

            {{ config('app.url') }}/{{ $shortened }}

        </a>
@stop