@extends('layouts.app')
@section ('content')
    <h1>Uredi penjalište</h1> 
    {!! Form::open(['action' => ['SpotsController@update', $spot->id], 'method' => 'POST']) !!}
    <div class="form-gorup">
        {{Form::label('ime', 'Ime')}}
        {{Form::text('ime', $spot->ime, ['class'=> 'form-control', 'placeholder' => 'Naziv penjališta'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('opis', 'Opis')}}
            {{Form::textarea('opis', $spot->opis, ['class'=> 'form-control', 'placeholder' => 'Opis penjališta'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('x', 'X')}}
            {{Form::text('x', $spot->x, ['class'=> 'form-control', 'placeholder' => 'x-koordinata'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('y', 'Y')}}
            {{Form::text('y', $spot->y, ['class'=> 'form-control', 'placeholder' => 'y-koordinata'])}}
    </div>
    
  
    <br>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

{!! Form::close() !!}

@endsection