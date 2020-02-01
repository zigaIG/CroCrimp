@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                             </div>
                        @endif
                    Prijavljeni ste!
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                                <h3>Postovi</h3>
                            <tr>
                                <th>Naslov posta</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td><a href="/posts/{{$post->id}}">{{$post->naslov}}</a></td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-secondary float-right">Uredi post</a></td>
                                    <td> {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Obriši post',['class'=> 'btn btn-outline-danger' ])}}
                                        {!!Form::close()!!} </td>
                                </tr>
                            @endforeach

                        </table>
                    @else
                        <p>Nemate objavljenih postova</p>
                    @endif

                    <a href="/posts/create" class="btn btn-outline-secondary ">Novi post</a>
                </div>
                {{-- ovo ispod je za penjalista --}}
                <div class="card-body">                     
                    @if(count($spots) > 0)
                        <table class="table table-striped">
                            <h3>Penjališta</h3>
                            <tr>
                                <th>Ime penjališta</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($spots as $spot)
                                <tr>
                                    <td><a href="/spots/{{$spot->id}}">{{$spot->ime}}</a></td>
                                    <td><a href="/spots/{{$spot->id}}/edit" class="btn btn-outline-secondary float-right">Uredi penjalište</a></td>
                                    <td> {!!Form::open(['action' => ['SpotsController@destroy', $spot->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Obriši penjalište',['class'=> 'btn btn-outline-danger' ])}}
                                        {!!Form::close()!!} </td>
                                </tr>
                            @endforeach

                        </table>
                    @else
                        <p>Niste kreirali penjalište</p>
                    @endif

                    <a href="/spots/create" class="btn btn-outline-secondary ">Novo penjalište</a>
                </div>
                                    {{-- ovo ispod je za sektore --}}
                <div class="card-body">                     
                        @if(count($sectors) > 0)
                            <table class="table table-striped">
                                <h3>Sektori</h3>
                                <tr>
                                    <th>Ime sektora</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($sectors as $sector)
                                    <tr>
                                        <td><a href="/sectors/{{$sector->id}}">{{$sector->ime}}</a></td>
                                        <td><a href="/sectors/{{$sector->id}}/edit" class="btn btn-outline-secondary float-right">Uredi sektor</a></td>
                                        <td> {!!Form::open(['action' => ['SectorsController@destroy', $sector->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Obriši sektor',['class'=> 'btn btn-outline-danger' ])}}
                                            {!!Form::close()!!} </td>
                                    </tr>
                                @endforeach
    
                            </table>
                        @else
                            <p>Niste kreirali sektor</p>
                        @endif
                        <tr>
                            <th>Novi sektor dodaje se u odabranom penjalištu</th>    
                        </tr>
                </div>
                {{-- ovo ispod je za smjerove  --}}  
                <div class="card-body">                     
                        @if(count($routes) > 0)
                            <table class="table table-striped">
                                <h3>Smjerovi</h3>
                                <tr>
                                    <th>Ime smjera</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($routes as $route)
                                    <tr>
                                        <td><a href="/routes/{{$route->id}}">{{$route->ime}}</a></td>
                                        <td><a href="/routes/{{$route->id}}/edit" class="btn btn-outline-secondary float-right">Uredi smjer</a></td>
                                        <td> {!!Form::open(['action' => ['RoutesController@destroy', $route->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Obriši smjer',['class'=> 'btn btn-outline-danger' ])}}
                                            {!!Form::close()!!} </td>
                                    </tr>
                                @endforeach
    
                            </table>
                        @else
                            <p>Niste kreirali smjer</p>
                        @endif
                        <tr>
                            <th>Novi smjer dodaje se u odabranom sektoru</th>    
                        </tr>
                        {{-- ovo ispod je za smjerove  --}}  
                <div class="card-body">                     
                        @if(count($comments) > 0)
                            <table class="table table-striped">
                                <h3>Komentari</h3>
                                <tr>
                                    <th>Komentar</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->comment}}</td>
                                        <td> {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Obriši komentar',['class'=> 'btn btn-outline-danger' ])}}
                                            {!!Form::close()!!} </td>
                                    </tr>
                                @endforeach
    
                            </table>
                        @else
                            <p>Niste komentirali</p>
                        @endif
                        <tr>
                            <th>Novi komentar dodaje se u odabranom smjeru</th>    
                        </tr>
                </div>                     
            </div>
        </div>
    </div>
</div>
@endsection
