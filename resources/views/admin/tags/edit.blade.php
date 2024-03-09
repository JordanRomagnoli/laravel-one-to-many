@extends('layouts.app')

@section('page-title', 'edit tecnologia')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                        Modifica la Tecnologia
                    </h1>

                    <form action="{{ route('admin.tags.update', ['tag' => $tag->slug])  }}" method="POST">
                        
                        @method('PUT')

                        @csrf

                        <label for="name" class="form-label">Nome Tecnologia</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome della Tecnologia"
                            maxlength="1024" value="{{$tag->name, old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

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