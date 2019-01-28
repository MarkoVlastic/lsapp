@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-success">Go Back</a>
   <h1>{{$post->title}}</h1>
   <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
   
   <div class="two">
       {!!$post->body!!}
   </div>
   <hr>
   <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if(!auth::guest())
    @if(auth::user()->id==$post->user_id)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
     {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
      {{Form::hidden('_method','DELETE')}}
      <div class="two">
      {{Form::submit('Delete',['class'=>'btn btn-info '])}}
      </div>
    {!!Form::close()!!}
      @endif
    @endif
@endsection