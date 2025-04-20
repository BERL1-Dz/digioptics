@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Détails du Fournisseur</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Nom:</strong>
                            <p>{{ $fournisseur->nom }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p>{{ $fournisseur->email }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Téléphone:</strong>
                            <p>{{ $fournisseur->telephone }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Adresse:</strong>
                            <p>{{ $fournisseur->adresse }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong>Ville:</strong>
                            <p>{{ $fournisseur->ville }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Pays:</strong>
                            <p>{{ $fournisseur->pays }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Notes:</strong>
                            <p>{{ $fournisseur->notes ?? 'Aucune note' }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('fournisseur.index') }}" class="btn btn-secondary">
                            <i class="bx bx-arrow-back"></i> Retour
                        </a>
                        <div class="d-flex gap-2">
                            <a href="{{ route('fournisseur.edit', $fournisseur) }}" class="btn btn-primary">
                                <i class="bx bx-edit"></i> Modifier
                            </a>
                            <form action="{{ route('fournisseur.destroy', $fournisseur) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')">
                                    <i class="bx bx-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 