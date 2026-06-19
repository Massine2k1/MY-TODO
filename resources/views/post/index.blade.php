@extends('layouts.base')
@section('content')
<h1 class="text-center">Liste des tâches</h1>

<div class="row">
@foreach ($post as $p)    
<div class="col-sm-3">
  <div class="card h-100">
    <div class="card-body d-flex flex-column justify-content-between">
      <div class="mb-3">
        <h5 class="card-title">{{ $p->title }}</h5>
        <p>Domaine: @foreach($p->tags as $tag)<span>{{$tag->name}}</span>@endforeach</p>
        <p>Priorité: <span>{{$p->priority->name}}</span></p>
        <p class="card-text">{{ str($p->content)->words(5) }}</p>
      </div>
      <div>
        <a href="#" class="btn btn-primary">Voir plus</a>
        <a href="#" class="btn btn-success">Modifier</a>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
@endsection