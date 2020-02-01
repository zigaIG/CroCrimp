@extends('layouts.app')
@section ('content')
    <h1>Uredi smjer</h1> 
    {!! Form::open(['action' => ['RoutesController@update', $route->id], 'method' => 'POST']) !!}
        <div class="form-gorup">
            {{Form::label('ime', 'Ime')}}
            {{Form::text('ime', $route->ime, ['class'=> 'form-control', 'placeholder' => 'Naziv smjera*'])}}
        </div>
        <div class="form-gorup">
                {{Form::label('ocjena', 'Ocjena')}}
                {{Form::text('Ocjena', $route->ocjena, ['class'=> 'form-control', 'placeholder' => 'Ocjena smjera'])}}
        </div>
        <div class="form-gorup">
                {{Form::label('duzina', 'Duzina')}}
                {{Form::number('duzina', $route->duzina, ['class'=> 'form-control', 'placeholder' => 'Dužina smjera'])}}
        </div>
        <div class="form-gorup">
                {{Form::label('broj_spitova', 'Broj spitova')}}
                {{Form::number('broj_spitova', $route->broj_spitova, ['class'=> 'form-control', 'placeholder' => 'Broj spitova'])}}
        </div>
        <div class="form-gorup">
            {{Form::label('opis', 'Opis')}}
            {{Form::textarea('opis', $route->opis, ['class'=> 'form-control', 'placeholder' => 'Opis smjera*'])}}
        </div>
        <div class="form-gorup">
                {{Form::label('postavio', 'Postavio')}}
                {{Form::text('postavio', $route->opis, ['class'=> 'form-control', 'placeholder' => 'Smjer je postavio'])}}
            </div> 
  
    <br>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection