@extends('layouts.app')

@section('content')
<h1>Vijesti</h1>

@if(count($posts) >0)
<div class="row">
    @foreach($posts as $post)
        
            <div class="col-md-4 mb-5">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h2 class="card-title"><a href="/posts/{{$post->id}}">{{$post->naslov}}</a></h2>
                                <p class="card-text">Objavio {{$post->created_at}} korisnik {{$post->user->name}}</p>
                             </div>                        
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="/posts/{{$post->id}}" class="btn btn-primary btn-sm">Saznaj više</a>
                    </div>
                </div>
            </div>
       
    @endforeach
    {{$posts->links()}}
</div>
@else
    <p>Nema postova</p>
@endif

@endsection