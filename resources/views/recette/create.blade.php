@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Nouvelle Recette</h4>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('recette.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('recette.form')
                        
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="{{ route('recette.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 