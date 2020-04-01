@extends('layouts.app')

@section('content')
<h1>{{$spot->ime}}</h1> 
<hr>


    @php
    
        $markers[] = [
            'title' => $spot->ime,
            'lat' => $spot->x,
            'lng' => $spot->y,
        ];
    
    @endphp
    @map([
        'lat' => '44.456178',
        'lng' => '15.680024',
        'zoom' => '6',
        'markers' => $markers
    ])
 


<hr>
<h3>{{$spot->ime}}</h3>
{{-- <li class='list-group-item'>{{$spot->ime}}</li> --}}

<p>{{$spot->opis}}</p>

<br>
<small>Penjalište objavljeno {{$spot->created_at}}</small> 
<small>by {{$spot->user->name}}</small>
<br>
@if(!Auth::guest())
        @if(Auth::user()->id == $spot->user_id)
            <a href="/spots/{{$spot->id}}/edit"  class="btn btn-outline-info">Uredi penjalište</a>
            {!!Form::open(['action' => ['SpotsController@destroy', $spot->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obriši penjalište',['class'=> 'btn btn-outline-danger' ])}}
            {!!Form::close()!!}
        @endif
 @endif
 
<br>
<h3>Sektori</h3>
<br>
@if(count($sectors) > 0)

<ul class='list-group'>
    @foreach($sectors as $sector)
        @if($spot->id == $sector->spot_id){{-- sa if uzimam samo sektore iz odabranog penjališta --}}
            <li class='list-group-item'><a href="/sectors/{{$sector->id}}">{{$sector->ime}}</a></li>
        @endif
    @endforeach
    {{$sectors->links()}}
</ul>   
@else
    <p>Nema dodanih sektora!</p>
@endif


<hr>


@if(Auth::check())
<h1>Dodaj sektor</h1> 


    {!! Form::open(['action' => 'SectorsController@store', 'method' => 'POST']) !!}
        <div class="form-gorup">
            {{Form::label('ime', 'Ime')}}
            {{Form::text('ime', '', ['class'=> 'form-control', 'placeholder' => 'Naziv sektora*'])}}
        </div>
        <div class="form-gorup">
            {{Form::label('opis', 'Opis')}}
            {{Form::textarea('opis', '', ['class'=> 'form-control', 'placeholder' => 'Opis sektora*'])}}
        </div>
            {{Form::hidden('id_penj', $spot->id, ['class'=> 'form-control'])}}
       {{--sa ovim gore povlačim s formom id penjališta 
          {{Form::hidden((['action' => ['SectorsController@store', $spot->id], 'method' => 'POST']))}} 
          --}}
        <br>
        <p>Polja označena sa * su obavezna</p>
        <br>
        {{Form::submit('Dodaj sektor', ['class'=> 'btn btn-outline-secondary'])}}
    {!! Form::close() !!}
<hr>
@endif

<a href="/spots" class="btn btn-outline-secondary">Nazad</a> 

@endsection
 