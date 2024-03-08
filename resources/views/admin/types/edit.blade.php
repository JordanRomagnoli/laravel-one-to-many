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

                    <form action="{{ route('admin.types.update', ['type' => $type->slug])  }}" method="POST">
                        
                        @method('PUT')

                        @csrf

                        <label for="name" class="form-label">Nome Tecnologia</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del nuovo progetto"
                            maxlength="1024" value="{{$type->name, old('name') }}">
                        @error('thumb')
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