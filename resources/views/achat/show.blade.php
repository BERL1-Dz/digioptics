@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Détails de l'Achat</h5>
                    <div class="d-flex">
                        <a href="{{ route('achat.edit', $achat->id) }}" class="btn btn-primary me-2">
                            <i class='bx bx-edit me-1'></i> Modifier
                        </a>
                        <a href="{{ route('achat.index') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back me-1'></i> Retour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Informations Générales</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Date</label>
                                        <p>{{ $achat->date->format('d/m/Y') }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Fournisseur</label>
                                        <p>{{ $achat->fournisseur->nom }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Notes</label>
                                        <p>{{ $achat->notes ?? 'Aucune note' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Résumé</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Total</label>
                                        <p class="h4">{{ number_format($achat->total, 2) }} DA</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Nombre de produits</label>
                                        <p>{{ $achat->produits->count() }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Date de création</label>
                                        <p>{{ $achat->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title mb-0">Produits</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Produit</th>
                                            <th class="text-center">Quantité</th>
                                            <th class="text-center">Prix Unitaire</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($achat->produits as $produit)
                                        <tr>
                                            <td>{{ $produit->nom }}</td>
                                            <td class="text-center">{{ $produit->pivot->quantite }}</td>
                                            <td class="text-center">{{ number_format($produit->pivot->prix_unitaire, 2) }} DA</td>
                                            <td class="text-center">{{ number_format($produit->pivot->total, 2) }} DA</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-end"><strong>Total Général:</strong></td>
                                            <td class="text-center"><strong>{{ number_format($achat->total, 2) }} DA</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 