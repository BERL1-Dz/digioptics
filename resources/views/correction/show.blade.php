@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Détails de la Correction</h5>
                    <div class="d-flex">
                        <a href="{{ route('corrections.edit', $corrections->id) }}" class="btn btn-primary me-2">
                            <i class='bx bx-edit-alt me-1'></i> Modifier
                        </a>
                        <a href="{{ route('correction.index') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back me-1'></i> Retour
                        </a>
                        <a href="{{ route('correction.print', $corrections->id) }}" class="btn btn-primary">
                            <i class="fas fa-print"></i> Print Prescription
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Patient Information -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <h6 class="info-title">Informations Patient</h6>
                                <div class="info-content">
                                    <p><strong>Nom:</strong> {{ $corrections->patient->nom }}</p>
                                    <p><strong>Prénom:</strong> {{ $corrections->patient->prenom }}</p>
                                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($corrections->date)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <h6 class="info-title">Type de Vision</h6>
                                <div class="info-content">
                                    <p><strong>Type:</strong> 
                                        @if($corrections->type_vision == 1)
                                            <span class="badge bg-label-primary">Vision de Loin</span>
                                        @elseif($corrections->type_vision == 2)
                                            <span class="badge bg-label-success">Vision de Près</span>
                                        @else
                                            <span class="badge bg-label-info">Bifocale</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Prescription Details -->
                    <div class="prescription-card">
                        <h6 class="prescription-title">Détails de la Prescription</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered prescription-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Droite (OD)</th>
                                        <th class="text-center">Gauche (OS)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="fw-bold">Sphere (SPH)</td>
                                        <td class="text-center">{{ $corrections->sph_od }}</td>
                                        <td class="text-center">{{ $corrections->sph_og }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Cylinder (CYL)</td>
                                        <td class="text-center">{{ $corrections->cly_od }}</td>
                                        <td class="text-center">{{ $corrections->cly_og }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Axis (AXI)</td>
                                        <td class="text-center">{{ $corrections->axe_od }}°</td>
                                        <td class="text-center">{{ $corrections->axe_og }}°</td>
                                    </tr>
                                    @if($corrections->type_vision == 2)
                                    <tr>
                                        <td class="fw-bold">Add</td>
                                        <td class="text-center">{{ $corrections->add_od }}</td>
                                        <td class="text-center">{{ $corrections->add_og }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <h6 class="info-title">PD (Pupillary Distance)</h6>
                                <div class="info-content">
                                    <p><strong>Distance:</strong> {{ $corrections->PD }} mm</p>
                                    @if($corrections->Near_Pd)
                                        <p><strong>Près:</strong> {{ $corrections->Near_Pd }} mm</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <h6 class="info-title">Monture</h6>
                                <div class="info-content">
                                    <p><strong>Marque:</strong> {{ $corrections->monture->marque_monture ?? 'Non spécifiée' }}</p>
                                    <p><strong>Option:</strong> {{ $corrections->option ?? 'Non spécifiée' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .info-card {
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

    .prescription-card {
        background-color: #f4f9ff;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .prescription-title {
        color: #3a4850;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .prescription-table {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
    }

    .prescription-table th {
        background-color: #bbbcff;
        color: #3a4850;
        font-weight: 700;
        padding: 1rem;
    }

    .prescription-table td {
        padding: 1rem;
        vertical-align: middle;
    }

    .badge {
        padding: 0.5rem 1rem;
        font-weight: 600;
    }

    .bg-label-primary {
        background-color: rgba(105, 108, 255, 0.12);
        color: #696cff;
    }

    .bg-label-success {
        background-color: rgba(71, 195, 99, 0.12);
        color: #47c363;
    }

    .bg-label-info {
        background-color: rgba(32, 201, 255, 0.12);
        color: #20c9ff;
    }
</style>
@endsection
