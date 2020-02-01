@extends('layouts.app')
@section ('content')
{{--    naslov vucem iz pages controlera --}}
    <h1>penjališta</h1> 
  {{--   @if(count($penjalista) > 0)
        <ul class='list-group'>
        @foreach ($penjalista as $penjaliste)
            <li class='list-group-item'>{{$penjaliste}}</li>
        @endforeach
    </ul>
    @endif 
    s ovim mogu ispisat sva penjalista iz baze ili predat u pagecontroller ali u contorler moram dohvatiti podatke iz baze--}}
    @map([
        'lat' => '44.456178',
        'lng' => '15.680024',
        'zoom' => '6',
        'markers' => [[
            'title' => 'Go NoWare',
            'lat' => '46.133096',
            'lng' => '16.463705',
            'url' => 'https://gonoware.com'
            'popup' => '<h3>Details</h3><p>Click <a href="https://gonoware.com">here</a>.</p>',
            ]  ],
    ])
    <hr>
    <hr>
    @if(count($spots) > 1)
    <ul class='list-group'>
    @foreach($spots as $spot)
        <li class='list-group-item'>{{$spot->ime}}</li>
    @endforeach
    </ul>
@else
    <p>nema postova</p>
@endif
@endsection