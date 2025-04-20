@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Détails du Patient</h3>
                    <div class="card-tools">
                        <a href="{{ route('patient.edit', $patient) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <a href="{{ route('patient.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Personal Information -->
                        <div class="col-md-6">
                            <div class="info-box">
                                <h4 class="info-box-title">Informations Personnelles</h4>
                                <div class="info-box-content">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Nom:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $patient->nom }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Prénom:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $patient->prenom }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Date de Naissance:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $patient->date_naissance->format('d/m/Y') }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Téléphone:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $patient->telephone }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $patient->email ?? 'Non spécifié' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Medical Information -->
                        <div class="col-md-6">
                            <div class="info-box">
                                <h4 class="info-box-title">Informations Médicales</h4>
                                <div class="info-box-content">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Groupe Sanguin:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $patient->groupe_sanguin ?? 'Non spécifié' }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Allergies:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $patient->allergies ?? 'Aucune' }}
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Antécédents:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            {{ $patient->antecedents ?? 'Aucun' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Livewire Component for Recettes -->
                    <livewire:patient-show :patientId="$patient->id" />
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.info-box {
    background: #fff;
    border-radius: 0.5rem;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.info-box-title {
    color: #566a7f;
    font-size: 1.25rem;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #d9dee3;
}

.info-box-content {
    color: #697a8d;
}

.table th {
    background-color: #f5f5f9;
    color: #566a7f;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #d9dee3;
}

.card-title {
    margin-bottom: 0;
    color: #566a7f;
}

.badge {
    padding: 0.5em 0.75em;
    font-size: 0.75em;
    font-weight: 600;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
}

.bg-success {
    background-color: #71dd37 !important;
    color: #fff;
}

.bg-warning {
    background-color: #ffab00 !important;
    color: #fff;
}
</style>
@endsection 