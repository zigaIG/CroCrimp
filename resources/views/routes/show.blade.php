@extends('layouts.app')

@section('content')
<h1>{{$route->sector->ime}}</h1> 
<hr>
<h3>{{$route->ime}}</h3>
{{-- slike --}}



{{--  @foreach($route_images as $route_image)
    @if($route->id == $route_image->route_id)
        <div>
            <img style="width:50%" src="/storage/route_images/{{$route_image->route_image}}">
        </div>
    @endif
@endforeach --}}
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach( $route_images as $route_image )
                <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach( $route_images as $route_image )
                <div class="item {{ $loop->first ? ' active' : '' }}" >
                    <img src="/storage/route_images/{{$route_image->route_image}}" alt="nemogu ucitati">
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




{{-- slike --}}
<p>Ocjena: {{$route->ocjena}}</p>
<p>Dužina: {{$route->duzina}}m</p>
<p>Broj spitova: {{$route->broj_spitova}}</p>
<p>{{$route->opis}}</p>
<p>Smjer postavio: {{$route->postavio}}</p>
<small>Objavio: {{$route->user->name}}</small>
<br>
<div class="container" style="background-color:gainsboro;">
<br>
{!!Form::open(['action'=> 'RouteImagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">
        {!!Form::file('route_image')!!}
      </div>
      {{Form::hidden('route_id', $route->id, ['class'=> 'form-control'])}}  
      {{Form::submit('Dodaj sliku smjera',['class'=> 'btn btn-outline-secondary' ])}}
{!!Form::close()!!}
<br>
</div>
@if(!Auth::guest())
        @if(Auth::user()->id == $route->user_id)
        <hr>
            <a href="/routes/{{$route->id}}/edit"  class="btn btn-outline-info">Uredi smjer</a>
            {!!Form::open(['action' => ['RoutesController@destroy', $route->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obriši smjer',['class'=> 'btn btn-outline-danger' ])}}
            {!!Form::close()!!}
        @endif
 @endif
<hr>
{{-- komentari --}}
@if(count($comments) > 0)
<h3> Komentari </h3>
<hr>
@foreach($comments as $comment)
    @if($comment->route_id == $route->id)
        <div class="container" style="background-color:gainsboro;">
        <div class="row">
            <div class="col-md-8">
              <div class="page-header">
                <div class="media">
                    <div class="media-body">
                        <br>
                        <h4>{{$comment->user->name}}</h4>   
                        <p>{{$comment->comment}}</p>
                    </div>
                </div>                                        
                </div>  
            </div>
            @if(!Auth::guest())
            @if(Auth::user()->id == $comment->user_id)                          
                {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Obriši komentar',['class'=> 'btn btn-outline-danger' ])}}
                {!!Form::close()!!}
            @endif
            @endif
        </div>
    </div>
    <br>
    @endif
@endforeach
@endif
{{-- komentari --}}
{{-- dodaj komentar --}}
@if(Auth::check())
<h4>Dodaj komentar</h4> 
    {!! Form::open(['action' => 'CommentsController@store', 'method' => 'POST']) !!}
        <div class="form-gorup">
            {{Form::label('comment', 'Komentar')}}
            {{Form::text('comment', '', ['class'=> 'form-control', 'placeholder' => 'Komentiraj*'])}}
        </div>
        {{Form::hidden('route_id', $route->id, ['class'=> 'form-control'])}}  
        <br>
        <p>Polja označena sa * su obavezna</p>          
        <br>
        {{Form::submit('Dodaj komentar', ['class'=> 'btn btn-outline-secondary'])}}
    {!! Form::close() !!}
<hr>
@endif
<a href="/sectors/{{$sector->id}}" class="btn btn-outline-secondary">Nazad</a> 


@endsection