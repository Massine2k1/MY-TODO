@extends('layouts.base')
@section('content')
<h1>Mon profil</h1>
<div>
  @if (Auth::user()->avatar)  
    <div>
        <strong>Mon avatar :</strong> <br>
        <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="avatar" class="rounded-circle object-fit-cover" style="width: 150px; height: 150px;">
    </div>
  @else
    <div>Pas encore d'avatar</div>
  @endif

  <form action="" method="post" enctype="multipart/form-data" class="mt-3">
    @csrf
    @method('PUT')
    
    <label for="avatar">
        {{ Auth::user()->avatar ? "Changer d'avatar :" : "Ajouter un avatar :" }}
    </label>
    <div>
      <input type="file" name="avatar" id="avatar" class="form-control-file">
      <button type="submit" class="btn btn-primary mt-2">Sauvegarder</button>
      @error('avatar')
        <p class="alert alert-danger">{{ $message }}</p>
      @enderror
    </div>
  </form>
</div>
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
