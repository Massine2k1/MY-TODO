@extends('layouts.base')
@section('content')
<h1>Mon profil</h1>
<p>Mon avatar : <img src="" alt="avatar"></p>
<div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Email: {{ Auth::user()->email }}</li>
    <li class="list-group-item">Nom: {{ Auth::user()->name }}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="btn btn-primary">Modifier</a>
    <a href="#" class="btn btn-danger">Supprimer mon compte</a>
  </div>
</div>
@endsection
