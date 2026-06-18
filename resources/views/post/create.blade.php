@extends('layouts.base')
@section('content')
<h1 class="text-center">Ajouter une tâche</h1>
<div class="d-flex flex-column align-items-center">
    <form class="w-50" method="post">
    <div class="form-group mb-3">
        <label for="title">Title :</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group mb-3">
        <label for="content">Content :</label>
        <textarea class="form-control" id="content" rows="3"></textarea>
    </div>

    <div class="form-group mb-3">
        <label for="due_date" class="form-label">A faire pour :</label>
        <input type="date" class="form-control" id="due_date" name="dateNaissance">
    </div>

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
    </div>
    <button class="btn btn-primary w-100">Créer</button>
    </form>
</div>
@endsection