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
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Téléphone:</strong>
                                        </div>
                                        <div class="col-md-8">
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-md-8">
                                           
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
                                            {{ $patient->groupe_sanguin }}
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

                    <!-- Recettes History -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="info-box">
                                <h4 class="info-box-title">Historique des Recettes</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Type de Verre</th>
                                                <th>Monture</th>
                                                <th>Total</th>
                                                <th>Montant Payé</th>
                                                <th>Reste à Payer</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        {{-- <tbody>
                                            @forelse($patient->recettes as $recette)
                                                <tr>
                                                    <td>{{ $recette->created_at->format('d/m/Y') }}</td>
                                                    <td>{{ $recette->type_verre }}</td>
                                                    <td>{{ $recette->monture->model_monture }}</td>
                                                    <td>{{ number_format($recette->total, 2) }} €</td>
                                                    <td>{{ number_format($recette->montant_paye, 2) }} €</td>
                                                    <td>{{ number_format($recette->reste_a_payer, 2) }} €</td>
                                                    <td>
                                                        <a href="{{ route('recette.show', $recette) }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('recette.pdf', $recette) }}" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Aucune recette trouvée</td>
                                                </tr>
                                            @endforelse
                                        </tbody> --}}
                                    </table>
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
</style>
@endsection 