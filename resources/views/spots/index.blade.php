@extends('layouts.app')
@section ('content')
    <h1>Penjališta</h1> 
    <hr>

    @php
    $markers = [];
    foreach($spots as $spot) {
        $markers[] = [
            'title' => $spot->ime,
            'lat' => $spot->x,
            'lng' => $spot->y,
            'url' => "spots/$spot->id"
        ];
    }
    @endphp
    @map([
        'lat' => '44.456178',
        'lng' => '15.680024',
        'zoom' => '6',
        'markers' => $markers
    ])
 
    <hr>
    @if(count($spots) > 0)
        <ul class='list-group'>
        @foreach($spots as $spot)
            <li class='list-group-item'><a href="/spots/{{$spot->id}}">{{$spot->ime}}</a></li>
            
        @endforeach
        {{$spots->links()}}
        </ul>
    @else
        <p>Nema kreiranih penjališta</p>
    @endif
    <br>
    @if(Auth::check())
    <a class="btn btn-outline-secondary" href="/spots/create">Dodaj penjaliste</a>
    @endif
@endsection