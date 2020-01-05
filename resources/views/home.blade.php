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
                        <tr>
                            <th>Naslov</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->naslov}}</td>
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
            </div>
        </div>
    </div>
</div>
@endsection
