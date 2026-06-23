@extends('layouts.base')
@section('content')
<h1>Mon profil</h1>
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
        @error('avatar')
          <p class="alert alert-danger">{{ $message }}</p>
        @enderror
      </div>

    <div class="card">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Email: {{ Auth::user()->email }}</li>
        <li class="list-group-item">
          <label for="name">Nom: </label>
          <input type="text" name="name" value="{{old('name',Auth::user()->name)}}"></li>
          @error('name')
            {{ $message }}
          @enderror
      </ul>
      <div class="card-body">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        <a href="#" class="btn btn-danger">Supprimer mon compte</a>
      </div>
    </div>
  </form>
@endsection
