@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Nouvelle Recette</h5>
                            <p class="mb-4">
                                Créer une nouvelle recette pour un patient
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Détails de la Recette</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('recette.store') }}" method="POST">
                        @php
                            $recette = new App\Models\Recette();
                            $recette->status = 'not_ready';
                        @endphp
                        @include('recette.form', ['recette' => $recette])
                        
                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <a href="{{ route('recette.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-select-lg {
        padding: 0.5rem 1rem;
        font-size: 1rem;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .card {
        margin-bottom: 1.5rem;
    }
</style>
@endpush 