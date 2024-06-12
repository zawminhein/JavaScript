@extends('layouts.app')

@section("content")
<div class="container">

   {{ $articles->links() }}

   @if (session('info'))
      <div class="alert alert-info">
         {{ session('info') }}
      </div>
   @endif
   @if (session('error'))
      <div class="alert alert-warning">
         {{ session('error') }}
      </div>
   @endif

   @foreach ($articles as $article)
      <div class="card mb-2">
         <div class="card-body">
            <h3 class="card-title h5">{{ $article->title }}</h3>
            <div class="card-subtitle mb-2 text-muted small">
               By <b class="text-success">{{ $article->user->name}}</b>
               {{ $article->created_at->diffForHumans() }}
               <b>Comment: {{ count($article->comments)}}</b>
            </div>
            <p class="card-text">{{ $article->body }}</p>
            <a href="{{"/articles/detail/$article->id"}}" class="card-link">
               View Detail &raquo;
            </a>
         </div>
      </div>
   @endforeach
</div>

@endsection