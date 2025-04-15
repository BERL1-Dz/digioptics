@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Détails de la Facture</h5>
                    <div class="d-flex">
                        <a href="{{ route('facture.print', $data['id']) }}" class="btn btn-primary me-2" target="_blank">
                            <i class="bx bx-printer me-1"></i> Imprimer
                        </a>
                        <a href="{{ route('facture.edit', $data['id']) }}" class="btn btn-warning me-2">
                            <i class="bx bx-edit me-1"></i> Modifier
                        </a>
                        <a href="{{ route('facture.index') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back me-1'></i> Retour
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Invoice Header -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="invoice-info-card">
                                <h6 class="info-title">Informations Facture</h6>
                                <div class="info-content">
                                    <p><strong>N° Facture:</strong> {{ $data['n_facture'] }}</p>
                                    <p><strong>Date:</strong> {{ $data['date'] }}</p>
                                    <p><strong>Client:</strong> {{ $data['facture_pour'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Items -->
                    <div class="invoice-items-card">
                        <h6 class="items-title">Articles</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered invoice-table">
                                <thead>
                                    <tr>
                                        <th>Désignation</th>
                                        <th>Référence</th>
                                        <th>Quantité</th>
                                        <th>Prix Unitaire</th>
                                        <th>Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < count($data['designation']); $i++)
                                    <tr>
                                        <td>{{ $data['designation'][$i] }}</td>
                                        <td>{{ $data['ref'][$i] }}</td>
                                        <td class="text-center">{{ $data['quantite'][$i] }}</td>
                                        <td class="text-end">{{ number_format($data['p_unitaire'][$i], 2, ',', ' ') }} Da</td>
                                        <td class="text-end">{{ number_format($data['montant'][$i], 2, ',', ' ') }} Da</td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Invoice Summary -->
                    <div class="row mt-4">
                        <div class="col-md-6 offset-md-6">
                            <div class="invoice-summary-card">
                                <table class="table table-borderless summary-table">
                                    <tr>
                                        <td><strong>Total HT:</strong></td>
                                        <td class="text-end">{{ number_format($data['t_h_t'], 2, ',', ' ') }} Da</td>
                                    </tr>
                                    <tr>
                                        <td><strong>TVA ({{ $data['t_v_a_p'] }}%):</strong></td>
                                        <td class="text-end">{{ number_format($data['t_v_a'], 2, ',', ' ') }} Da</td>
                                    </tr>
                                    <tr class="total-row">
                                        <td><strong>Total TTC:</strong></td>
                                        <td class="text-end">{{ number_format($data['t_t_c'], 2, ',', ' ') }} Da</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .invoice-info-card {
        background-color: #f4f9ff;
        border-radius: 8px;
        padding: 1.5rem;
        height: 100%;
    }

    .info-title {
        color: #3a4850;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .info-content p {
        margin-bottom: 0.5rem;
        color: #6b6b6b;
    }

    .invoice-items-card {
        background-color: #f4f9ff;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .items-title {
        color: #3a4850;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .invoice-table {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
    }

    .invoice-table th {
        background-color: #bbbcff;
        color: #3a4850;
        font-weight: 700;
        padding: 1rem;
    }

    .invoice-table td {
        padding: 1rem;
        vertical-align: middle;
    }

    .invoice-summary-card {
        background-color: #f4f9ff;
        border-radius: 8px;
        padding: 1.5rem;
    }

    .summary-table {
        margin-bottom: 0;
    }

    .summary-table td {
        padding: 0.5rem 0;
    }

    .total-row {
        border-top: 2px solid #bbbcff;
        font-size: 1.1rem;
    }

    .total-row td {
        padding-top: 1rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
    }

    .btn i {
        margin-right: 0.5rem;
    }
</style>
@endsection
