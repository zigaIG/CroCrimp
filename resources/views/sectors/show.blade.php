@extends('layouts.app')

@section('content')
<h1>{{$sector->spot->ime}}</h1> 
<hr>
<h3>{{$sector->ime}}</h3>
{{-- <li class='list-group-item'>{{$sector->ime}}</li> --}}

<p>{{$sector->opis}}</p>

<br>
<small>Sektor objavljen {{$sector->created_at}}</small>
<small>by {{$sector->user->name}}</small>
<br>
@if(!Auth::guest())
        @if(Auth::user()->id == $sector->user_id)
            <a href="/sectors/{{$sector->id}}/edit"  class="btn btn-outline-info">Uredi sektor</a>
            {!!Form::open(['action' => ['SectorsController@destroy', $sector->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obriši sektor',['class'=> 'btn btn-outline-danger' ])}}
            {!!Form::close()!!}
        @endif
 @endif
 <hr>
 
 <hr>
<br>
<h3>Smjerovi</h3>
<br>

@if(count($routes) > 0)
<ul class='list-group'>
    @foreach($routes as $route)
        @if($sector->id == $route->sector_id)
            <li class='list-group-item'><a href="/routes/{{$route->id}}">{{$route->ime}}</a></li>
        @endif
    @endforeach
    {{$routes->links()}}
</ul> 
<hr>
@endif

@if(Auth::check())
<h1>Dodaj smjer</h1> 


    {!! Form::open(['action' => 'RoutesController@store', 'method' => 'POST']) !!}
        <div class="form-gorup">
            {{Form::label('ime', 'Ime')}}
            {{Form::text('ime', '', ['class'=> 'form-control', 'placeholder' => 'Naziv smjera*'])}}
        </div>
        <div class="form-gorup">
                {{Form::label('ocjena', 'Ocjena')}}
                {{Form::text('Ocjena', '', ['class'=> 'form-control', 'placeholder' => 'Ocjena smjera'])}}
        </div>
        <div class="form-gorup">
                {{Form::label('duzina', 'Duzina')}}
                {{Form::number('duzina', '', ['class'=> 'form-control', 'placeholder' => 'Dužina smjera'])}}
        </div>
        <div class="form-gorup">
                {{Form::label('broj_spitova', 'Broj spitova')}}
                {{Form::number('broj_spitova', '', ['class'=> 'form-control', 'placeholder' => 'Broj spitova'])}}
        </div>
        <div class="form-gorup">
            {{Form::label('opis', 'Opis')}}
            {{Form::textarea('opis', '', ['class'=> 'form-control', 'placeholder' => 'Opis smjera*'])}}
        </div>
        <div class="form-gorup">
                {{Form::label('postavio', 'Postavio')}}
                {{Form::text('postavio', '', ['class'=> 'form-control', 'placeholder' => 'Smjer je postavio'])}}
            </div>   
        {{Form::hidden('sector_id', $sector->id, ['class'=> 'form-control'])}}  
        <br>
        <p>Polja označena sa * su obavezna</p>          
        <br>
        {{Form::submit('Dodaj smjer', ['class'=> 'btn btn-outline-secondary'])}}
    {!! Form::close() !!}
<hr>
@endif

<a href="/spots/{{$sector->spot->id}}" class="btn btn-outline-secondary">Nazad</a> 

@endsection