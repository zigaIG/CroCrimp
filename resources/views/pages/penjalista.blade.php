@extends('layouts.app')
@section ('content')
    <h1>{{$title}}</h1>
    @if(count($penjalista) > 0)
        <ul class='list-group'>
        @foreach ($penjalista as $penjaliste)
            <li class='list-group-item'>{{$penjaliste}}</li>
        @endforeach
    </ul>
    @endif
@endsection