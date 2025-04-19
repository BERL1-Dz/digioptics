@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Détails de la Recette</h5>
                    <div>
                        <a href="{{ route('recette.edit', $recette) }}" class="btn btn-primary">
                            <i class="bx bx-edit-alt me-1"></i> Modifier
                        </a>
                        <a href="{{ route('recette.pdf', $recette) }}" class="btn btn-info">
                            <i class="bx bx-download me-1"></i> PDF
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Informations Client</h6>
                            <table class="table">
                                <tr>
                                    <th>Nom:</th>
                                    <td>{{ $recette->client_nom }}</td>
                                </tr>
                                <tr>
                                    <th>Prénom:</th>
                                    <td>{{ $recette->client_prenom }}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone:</th>
                                    <td>{{ $recette->client_telephone }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Informations Financières</h6>
                            <table class="table">
                                <tr>
                                    <th>Total:</th>
                                    <td>{{ number_format($recette->total, 2, ',', ' ') }} DH</td>
                                </tr>
                                <tr>
                                    <th>Montant Payé:</th>
                                    <td>{{ number_format($recette->montant_paye, 2, ',', ' ') }} DH</td>
                                </tr>
                                <tr>
                                    <th>Reste à Payer:</th>
                                    <td>{{ number_format($recette->reste_a_payer, 2, ',', ' ') }} DH</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h6>Vision de Loin</h6>
                            <table class="table">
                                <tr>
                                    <th>Œil Droit:</th>
                                    <td>
                                        Sphère: {{ $recette->oeil_droit_sphere }}<br>
                                        Cylindre: {{ $recette->oeil_droit_cylindre }}<br>
                                        Axe: {{ $recette->oeil_droit_axe }}°
                                    </td>
                                </tr>
                                <tr>
                                    <th>Œil Gauche:</th>
                                    <td>
                                        Sphère: {{ $recette->oeil_gauche_sphere }}<br>
                                        Cylindre: {{ $recette->oeil_gauche_cylindre }}<br>
                                        Axe: {{ $recette->oeil_gauche_axe }}°
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Vision de Près</h6>
                            <table class="table">
                                <tr>
                                    <th>Œil Droit:</th>
                                    <td>
                                        Sphère: {{ $recette->oeil_droit_sphere_pres }}<br>
                                        Cylindre: {{ $recette->oeil_droit_cylindre_pres }}<br>
                                        Axe: {{ $recette->oeil_droit_axe_pres }}°<br>
                                        Addition: {{ $recette->oeil_droit_addition }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Œil Gauche:</th>
                                    <td>
                                        Sphère: {{ $recette->oeil_gauche_sphere_pres }}<br>
                                        Cylindre: {{ $recette->oeil_gauche_cylindre_pres }}<br>
                                        Axe: {{ $recette->oeil_gauche_axe_pres }}°<br>
                                        Addition: {{ $recette->oeil_gauche_addition }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h6>Monture et Verres</h6>
                            <table class="table">
                                <tr>
                                    <th>Monture:</th>
                                    <td>{{ $recette->monture->model_monture ?? 'Non spécifiée' }}</td>
                                </tr>
                                <tr>
                                    <th>Type de Verre:</th>
                                    <td>{{ $recette->type_verre }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Notes</h6>
                            <p>{{ $recette->notes ?? 'Aucune note' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 