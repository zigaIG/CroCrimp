@extends('layouts.app')

@section('content')
<h1>Novi post</h1>
{!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-gorup">
        {{Form::label('naslov', 'Naslov')}}
        {{Form::text('naslov', '', ['class'=> 'form-control', 'placeholder' => 'Naslov'])}}
    </div>
    <div class="form-gorup">
            {{Form::label('text', 'Text')}}
            {{Form::textarea('text', '', ['id' => 'article-ckeditor', 'class'=> 'form-control', 'placeholder' => 'Text'])}}
    </div>
    <br>
    <div class="form-group">
        {{Form::file('cover_image')}}

    </div>
    <br>
    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}

{!! Form::close() !!}
@endsection
