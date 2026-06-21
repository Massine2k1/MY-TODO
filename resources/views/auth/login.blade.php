@extends('layouts.base')
@section('content')
<h1>Connexion</h1>
<form action="" method="post">
   @csrf
  <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  @error('email')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label for="password">Mot de passse :</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
    @error('password')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
@endsection