@extends('layouts.app')

@section('page-title', 'Aggiungi tecnologia')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1>
                       Aggiungi una nuova tecnologia
                    </h1>

                    <form action="{{ route('admin.tags.store') }}" method="POST">
                        @csrf
                        
                        <label for="name" class="form-label">Nome Tecnologia</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome della nuova tecnologia"
                            maxlength="1024" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiungi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection