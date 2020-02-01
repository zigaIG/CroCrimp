@extends('layouts.app')
@section ('content')
    <h1>Dodaj penjalište</h1> 
    {!! Form::open(['action' => 'SpotsController@store', 'method' => 'POST']) !!}
    <div class="form-gorup">
        {{Form::label('ime', 'Ime')}}
        {{Form::text('ime', '', ['class'=> 'form-control', 'placeholder' => 'Naziv penjališta'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('opis', 'Opis')}}
            {{Form::textarea('opis', '', ['class'=> 'form-control', 'placeholder' => 'Opis penjališta'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('x', 'X')}}
            {{Form::text('x', '', ['class'=> 'form-control', 'placeholder' => 'x-koordinata'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('y', 'Y')}}
            {{Form::text('y', '', ['class'=> 'form-control', 'placeholder' => 'y-koordinata'])}}
    </div>
    
  
    <br>
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

{!! Form::close() !!}

@endsection