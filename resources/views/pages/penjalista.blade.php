@extends('layouts.app')
@section ('content')
    <h1>Penjališta</h1>
    {{-- <h1>{{$title}}</h1> --}}
  {{--   @if(count($penjalista) > 0)
        <ul class='list-group'>
        @foreach ($penjalista as $penjaliste)
            <li class='list-group-item'>{{$penjaliste}}</li>
        @endforeach
    </ul>
    @endif --}}
    @map([
        'lat' => '44.456178',
        'lng' => '15.680024',
        'zoom' => '6',
        'markers' => [[
            'title' => 'Go NoWare',
            'lat' => '46.133096',
            'lng' => '16.463705',
            'url' => 'https://gonoware.com',
        ]],
    ])
@endsection