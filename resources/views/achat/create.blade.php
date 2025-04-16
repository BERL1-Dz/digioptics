@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Achats /</span> Nouvel Achat
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Nouvel Achat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('achat.store') }}" method="POST">
                        @csrf
                        <livewire:achat-form />
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <a href="{{ route('achat.index') }}" class="btn btn-secondary">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 