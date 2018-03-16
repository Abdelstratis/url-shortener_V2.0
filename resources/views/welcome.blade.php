@extends('layouts.base')

@section('content')

        <h1>The Best URL Shortener Out There !</h1>

        {{ csrf_field() }}

        {!! Form::open(['url' => '/']) !!}

        {!! Form::label('nom', 'Entrez votre URL original : ') !!}

        {!! Form::text('url') !!}

        {!! Form::submit('Envoyer !') !!}

        {!! Form::close() !!}
@stop