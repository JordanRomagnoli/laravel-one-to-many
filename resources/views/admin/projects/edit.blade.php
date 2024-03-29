@extends('layouts.app')

@section('page-title', 'edit progetto')

@section('main-content')
    <section id="edit-project">
        <h1>
            Modifica il <span>progetto</span>
        </h1>
    
        <form action="{{ route('admin.projects.update',['project' => $project->slug])  }}" method="POST">
            
            @method('PUT')
    
            @csrf
    
            <label for="title" class="form-label">Nome Progetto</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del nuovo progetto"
                maxlength="1024" value="{{$project->title, old('title') }}">
            @error('title')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

            <label for="content" class="form-label">Descrizione</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Inserisci la descrizione del progetto"
                maxlength="1024" value="{{$project->content, old('content') }}">
            @error('content')
                <div class="error">
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
                            type="checkbox"
                            id="tag-{{ $tag->id }}"
                            name="tags[]"
                            value="{{ $tag->id }}">
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>
                @endforeach
            </div>
    
            <div>
                <button type="submit" class="">
                    + Aggiorna
                </button>
            </div>
        </form>
    </section>
    
            
@endsection