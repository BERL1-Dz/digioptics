@extends('layouts.app')

@section('title', 'Détails de la Vente')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Détails de la Vente</h5>
                    <div>
                        <div class="btn-group me-2">
                            <a href="{{ route('vent.pdf', ['vent' => $vent, 'preview' => true]) }}" class="btn btn-info" target="_blank">
                                <i class='bx bx-show me-1'></i> Aperçu PDF
                            </a>
                            <a href="{{ route('vent.pdf', $vent) }}" class="btn btn-success">
                                <i class='bx bx-download me-1'></i> Télécharger
                            </a>
                        </div>
                        <a href="{{ route('vent.edit', $vent) }}" class="btn btn-primary me-2">
                            <i class='bx bx-edit me-1'></i> Modifier
                        </a>
                        <a href="{{ route('vent.index') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back me-1'></i> Retour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="invoice-container">
                        <div class="invoice-header">
                            <div class="row">
                                <div class="col-md-6">
                                <img src="http://127.0.0.1:8000/storage/logos/logo_1744975878_6802380604528.png" alt="Logo" class="invoice-logo" style="max-height: 75px;margin-bottom: 20px;">
                                    <h2 class="invoice-title">Facture de Vente</h2>
                                    <p class="invoice-number">N°: VENT-{{ str_pad($vent->id, 6, '0', STR_PAD_LEFT) }}</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h4>{{ $vent->opticienInfo->nom_entreprise }}</h4>
                                    <p>{{ $vent->opticienInfo->adresse }}<br>
                                       {{ $vent->opticienInfo && isset($vent->opticienInfo->ville) ? $vent->opticienInfo->ville . ', ' . $vent->opticienInfo->code_postal : 'Alger, Algérie' }}<br>
                                       Tél: {{ $vent->opticienInfo ? $vent->opticienInfo->telephone : '+213 XX XX XX XX' }}<br>
                                       Email: {{ $vent->opticienInfo ? $vent->opticienInfo->email : 'contact@example.com' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Informations du Fournisseur</h5>
                                    <p><strong>Nom:</strong> {{ $vent->fournisseur->nom }}<br>
                                       <strong>Email:</strong> {{ $vent->fournisseur->mail_fournisseur ?? 'Non spécifiée' }}<br>
                                       <strong>Téléphone:</strong> {{ $vent->fournisseur->numero_fournisseur ?? 'Non spécifié' }}</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h5>Détails de la Facture</h5>
                                    <p><strong>Date:</strong> {{ $vent->date->format('d/m/Y') }}<br>
                                       <strong>Référence:</strong> VENT-{{ str_pad($vent->id, 6, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </div>
                        </div>

                        @if($vent->notes)
                        <div class="invoice-notes">
                            <h5>Notes</h5>
                            <p>{{ $vent->notes }}</p>
                        </div>
                        @endif

                        <div class="invoice-items">
                            @if($vent->verres->isNotEmpty())
                            <div class="table-responsive mb-4">
                                <h6>Verres</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Index</th>
                                            <th>Quantité</th>
                                            <th>Prix Unitaire</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vent->verres as $verre)
                                        <tr>
                                            <td>{{ $verre->index_verre }}</td>
                                            <td>{{ $verre->pivot->quantite }}</td>
                                            <td class="text-end">{{ number_format($verre->pivot->prix_unitaire, 2, ',', ' ') }} DA</td>
                                            <td class="text-end">{{ number_format($verre->pivot->total, 2, ',', ' ') }} DA</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif

                            @if($vent->lentilles->isNotEmpty())
                            <div class="table-responsive mb-4">
                                <h6>Lentilles</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Libellé</th>
                                            <th>Quantité</th>
                                            <th>Prix Unitaire</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vent->lentilles as $lentille)
                                        <tr>
                                            <td>{{ $lentille->libellé }}</td>
                                            <td>{{ $lentille->pivot->quantite }}</td>
                                            <td class="text-end">{{ number_format($lentille->pivot->prix_unitaire, 2, ',', ' ') }} DA</td>
                                            <td class="text-end">{{ number_format($lentille->pivot->total, 2, ',', ' ') }} DA</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif

                            @if($vent->montures->isNotEmpty())
                            <div class="table-responsive">
                                <h6>Montures</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Modèle</th>
                                            <th>Quantité</th>
                                            <th>Prix Unitaire</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vent->montures as $monture)
                                        <tr>
                                            <td>{{ $monture->model_monture }}</td>
                                            <td>{{ $monture->pivot->quantite }}</td>
                                            <td class="text-end">{{ number_format($monture->pivot->prix_unitaire, 2, ',', ' ') }} DA</td>
                                            <td class="text-end">{{ number_format($monture->pivot->total, 2, ',', ' ') }} DA</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>

                        <div class="invoice-total">
                            <div class="row">
                                <div class="col-md-6 offset-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="text-end">Total Général</th>
                                            <td class="text-end" style="width: 150px;">{{ number_format($vent->total, 2, ',', ' ') }} DA</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Merci de votre confiance</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p>Signature</p>
                                    <div class="signature-line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        .invoice-container, .invoice-container * {
            visibility: visible;
        }
        .invoice-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .no-print {
            display: none !important;
        }
    }

    .invoice-container {
        padding: 20px;
        background: #fff;
    }

    .invoice-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #eee;
    }

    .invoice-title {
        color: #333;
        margin-top: 20px;
    }

    .invoice-number {
        color: #666;
        font-size: 1.1em;
    }

    .invoice-info {
        margin-bottom: 30px;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 5px;
    }

    .invoice-notes {
        margin-bottom: 30px;
        padding: 15px;
        background: #f5f5f5;
        border-radius: 5px;
    }

    .invoice-items {
        margin-bottom: 30px;
    }

    .invoice-items table {
        margin-bottom: 20px;
    }

    .invoice-items th {
        background: #f8f9fa;
    }

    .invoice-total {
        margin-bottom: 30px;
    }

    .invoice-footer {
        margin-top: 50px;
        padding-top: 20px;
        border-top: 2px solid #eee;
    }

    .signature-line {
        width: 200px;
        border-top: 1px solid #000;
        margin-top: 50px;
    }

    .text-end {
        text-align: right;
    }
</style>
@endpush 