@extends('layouts.base')

@section('content')
<div class="card">
  <h5 class="card-header">{{$post->title}}</h5>
  <div class="card-body">
    <h5 class="card-title">A faire pour le {{ \Carbon\Carbon::parse($post->due_date)->format('d/m/Y')}}</h5>
    <p class="card-text">{{$post->content}}</p>
    <a href="#" class="btn btn-primary">Modifier</a>
  </div>
</div>
@endsection