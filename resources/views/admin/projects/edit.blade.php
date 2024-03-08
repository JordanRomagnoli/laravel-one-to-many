@extends('layouts.app')

@section('page-title', 'edit progetto')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                        modifica Progetto
                    </h1>

                    <form action="{{ route('admin.projects.update',['project' => $project->slug])  }}" method="POST">
                        
                        @method('PUT')

                        @csrf

                        <label for="title" class="form-label">Nome Progetto</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del nuovo progetto"
                            maxlength="1024" value="{{$project->title, old('title') }}">
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="content" class="form-label">Descrizione</label>
                        <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci la descrizione del progetto"
                            maxlength="1024" value="{{$project->content, old('content') }}">
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="type_id" class="form-label">Settore</label>
                        <select name="type_id" id="type_id" class="form-select">
                            <option
                                {{ old('type_id', $project->type_id) == null ? 'selected' : '' }}
                                value="">
                                Seleziona un settore...
                            </option>
                            @foreach ($types as $type)
                                <option
                                    {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}
                                    value="{{ $type->id }}">
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>

                        <label class="form-label">Tecnologie</label>

                        <div>
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <input
                                        @if ($errors->any())
                                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                                        @else
                                            {{ $project->tags->contains($tag->id) ? 'checked' : '' }}
                                        @endif
                                        class="form-check-input"
                                        type="checkbox"
                                        id="tag-{{ $tag->id }}"
                                        name="tags[]"
                                        value="{{ $tag->id }}">
                                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiorna
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection