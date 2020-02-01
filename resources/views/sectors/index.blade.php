@extends('layouts.app')
@section ('content')
    {{-- <h1>{{$sector->spot->ime}}</h1> --}}
    <h2>Sektori</h2>
    @foreach($spots as $spot)
    @endforeach
    @if(count($sectors) > 0)
        <ul class='list-group'>
            @foreach($sectors as $sector)
                <li class='list-group-item'><a href="/sectors/{{$sector->id}}">{{$sector->ime}}</a></li>
            @endforeach
        </ul>   
    @else
        <p>Nema dodanih sektora!</p>
    @endif
{{--     <a class="btn btn-outline-secondary" href="/sectors/create">Dodaj sektor</a>--}}
@endsection