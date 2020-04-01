@extends('layouts.app')

@section('content')
<h1>{{$route->sector->ime}}</h1> 
<hr>
<h3>{{$route->ime}}</h3>
{{-- slike --}}

<div class="row">
    @foreach($route_images as $route_image)
        @if($route->id == $route_image->route_id)
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">   
                    <a href="/storage/route_images/{{$route_image->route_image}}">
                        <img style="width:100%" src="/storage/route_images/{{$route_image->route_image}}"> 
                    </a>   
                        @if(!Auth::guest())
                             @if(Auth::user()->id == $route_image->user_id)
                        <hr>
                             {!!Form::open(['action' => ['RouteImagesController@destroy', $route_image->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Obriši sliku',['class'=> 'btn btn-outline-danger' ])}}
                            {!!Form::close()!!}
                             @endif
                        @endif
                                                                        
                    </div>
                </div>
            </div>
         @endif
    @endforeach
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
@if(Auth::user())
{!!Form::open(['action'=> 'RouteImagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">
        {!!Form::file('route_image')!!}
      </div>
      {{Form::hidden('route_id', $route->id, ['class'=> 'form-control'])}}  
      {{Form::submit('Dodaj sliku smjera',['class'=> 'btn btn-outline-secondary' ])}}
{!!Form::close()!!}
@endif
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
            <div style="padding-top: 20px">
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
{{-- <a href="/sectors/{{$sector->id}}" class="btn btn-outline-secondary">Nazad</a> --}} 


  <script>
        document.querySelector('.carousel-inner > div:first-child').classList.add('active');
    </script>

@endsection