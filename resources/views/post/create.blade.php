@extends('layouts.base')
@section('content')
@if ($post->exists)
<h1 class="text-center">Modification de la tâche</h1> 
@else
<h1 class="text-center">Ajouter une tâche</h1>
@endif
<div class="d-flex flex-column align-items-center">
    <form class="w-50" method="post">
    @csrf
    @if ($post->exists)
        @method('PUT')
    @endif
    <div class="form-group mb-3">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('name', $post->title) }}">
    </div>
    @error('title')
        {{ $message }}
    @enderror

    <div class="form-group mb-3">
        <label for="content">Description :</label>
        <textarea class="form-control" id="content" rows="3" name="content">{{ old('content', $post->content) }}</textarea>
    </div>
    @error('content')
        {{ $message }}
    @enderror

    <div class="form-group mb-3">
        <label for="due_date" class="form-label">A faire pour :</label>
        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $post->due_date) }}">
    </div>
    @error('due_date')
        {{ $message }}
    @enderror

    <div class="form-group mb-3">
        <label for="priority">Priorité :</label>
        <select class="form-control" id="priority" name="priority_id">
        @foreach ($priorities as $priority)            
            <option value="{{ $priority->id }}"
                @selected(old('priority_id',$post->priority_id ?? null)==$priority->id)>
                {{$priority->name}}
            </option>
        @endforeach
        </select>
        @error('priority_id')
            {{ $message }}
        @enderror
    </div>
    @php
        $tagsIds = $post->tags()->pluck('id');
    @endphp
    <div class="form-group mb-3">
        <label for="tags">Domaine :</label>
        <select multiple class="form-control" id="tags" name="tags[]">
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" @selected(collect(old('tags', $tagsIds))->contains($tag->id))>
                {{ $tag->name }}
            </option>
        @endforeach
        </select>
        @error('tags[]')
            {{ $message }}
        @enderror
    </div>
    @if ($post->exists)  
    <button class="btn btn-primary w-100" type="submit">Modifier</button>
    @else      
    <button class="btn btn-primary w-100" type="submit">Créer</button>
    @endif
    </form>
</div>
@endsection