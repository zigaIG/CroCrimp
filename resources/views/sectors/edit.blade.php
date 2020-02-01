@extends('layouts.app')
@section ('content')
    <h1>Uredi sektor</h1> 
    {!! Form::open(['action' => ['SectorsController@update', $sector->id], 'method' => 'POST']) !!}
    <div class="form-gorup">
        {{Form::label('ime', 'Ime')}}
        {{Form::text('ime', $sector->ime, ['class'=> 'form-control', 'placeholder' => 'Naziv sektora'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('opis', 'Opis')}}
            {{Form::textarea('opis', $sector->opis, ['class'=> 'form-control', 'placeholder' => 'Opis sektora'])}}
    </div> 
  
    <br>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection