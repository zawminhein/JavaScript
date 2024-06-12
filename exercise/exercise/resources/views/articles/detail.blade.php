@extends('layouts.app')

@section("content")



<div class="container">
   @if (session('error'))
      <div class="alert alert-warning text-center">
         {{ session('error') }}
      </div>
   @endif
      <div class="card mb-2">
         <div class="card-body">
            <h3 class="card-title h5">{{ $article->title }}</h3>
            <div class="card-subtitle mb-2 text-muted small">
               {{ $article->created_at->diffForHumans() }}
               Category: <b>{{ $article->category->name}}</b>
            </div>
            <p class="card-text">{{ $article->body }}</p>
            <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-outline-danger">
               Delete
            </a>
            <a href="{{url("/articles/edit/$article->id")}}" class="btn btn-outline-primary">
               Edit
            </a>
         </div>
      </div>

      <ul class="list-group">
         <li class="list-group-item active">
            <b>Comment: {{ count($article->comments) }}</b>
         </li>
         @foreach ($article->comments as $comment)
             <li class="list-group-item">
               <a href="{{ url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
               {{ $comment->content }}
               <div class="small mt-2">
                  By  <b class="text-success">{{ $comment->user->name }}</b>,
                  {{ $comment->created_at->diffForHumans() }}
               </div>
             </li>
         @endforeach
      </ul>

      @auth
         <form action="{{ url('/comments/add')}}" method="post">
         @csrf
         <input type="hidden" name="article_id" value="{{ $article->id }}">
         <textarea name="content" class="form-control" placeholder="New comment"></textarea>
         <input type="submit" value="Add comment" class="btn btn-secondary">
      </form>
      @endauth
      
</div>

@endsection