@extends('layouts.app')

@section('page-title', 'Tutti le tecnologie')

@section('main-content')
    <section id="index-types-admin">
        <div class="container">
            <div class="row">
                @foreach ($types as $singleType)
                    <div class="col-3">
                        <a href="" class="edit-button">
                            <i class="fa-solid fa-pencil"></i>
                        </a>

                        <a href="" class="delete-button">
                            <i class="fa-solid fa-eraser"></i>
                        </a>
                        <a href="{{ route('admin.types.show', ['type'=>$singleType->slug]) }}">

                            <div class="tecnology">
                                <h3>
                                    {{$singleType->name}}
                                </h3>
                            </div>
                            
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection