@extends('layouts.app')

@section('content')
<div class="blog-post">
    <h1 class="blog-post-title">{{$post->naslov}}</h1>
    <img style="width:75%" src="/storage/cover_images/{{$post->cover_image}}">
    <hr>
    <div>
        {!!$post->text!!}
    </div>
    <small class="card-text">Objavio {{$post->created_at}} korisnik {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        	<a href="/posts/{{$post->id}}/edit"  class="btn btn-outline-info">Uredi post</a>

            {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Obriši post',['class'=> 'btn btn-outline-danger' ])}}
            {!!Form::close()!!}
        @endif
    @endif
<br>
    <a href="/posts" class="btn btn-outline-secondary">Nazad</a>


</div>

@endsection