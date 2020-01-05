@extends('layouts.app')

@section('content')
<h1>Uredi post</h1>
{!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-gorup">
        {{Form::label('naslov', 'Naslov')}}
        {{Form::text('naslov', $post->naslov, ['class'=> 'form-control', 'placeholder' => 'Naslov'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('text', 'Text')}}
            {{Form::textarea('text', $post->text, ['id' => 'article-ckeditor', 'class'=> 'form-control', 'placeholder' => 'Text'])}}
    </div>
    <br>
    <div class="form-group">
       {{Form::file('cover_image')}}
    </div>
    <br>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

{!! Form::close() !!}

@endsection