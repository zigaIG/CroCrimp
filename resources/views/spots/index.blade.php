@extends('layouts.app')
@section ('content')
    <h1>Penjališta</h1> 
    <hr>
    @map([
        'lat' => '44.456178',
        'lng' => '15.680024',
        'zoom' => '6',
        'markers' => [[
            'title' => 'Kalnik',
            'lat' => '46.133096',
            'lng' => '16.463705',
            'url' => 'https://gonoware.com',
]       /* kako staviti foreach u ovo da prikaže vise markera,[
            'title' => 'Go NoWare',
            'lat' => '46.533996',
            'lng' => '16.463005',
            'url' => 'https://gonoware.com',
        ]    ovak se dodaju drugi markeri*/],
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