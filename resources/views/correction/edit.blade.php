@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Modifier la Correction</h5>
                    <div class="d-flex">
                        <a href="{{ route('correction.index') }}" class="btn btn-secondary">
                            <i class='bx bx-arrow-back me-1'></i> Retour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('correction.update', $corrections->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Patient Information -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Informations Patient</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Patient</label>
                                            <select name="patient_id" class="form-select">
                                                @foreach($patients as $patient)
                                                    <option value="{{ $patient->id }}" {{ $corrections->patient_id == $patient->id ? 'selected' : '' }}>
                                                        {{ $patient->nom }} {{ $patient->prenom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control" value="{{ $corrections->date }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Type de Vision</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <select name="type_vision" class="form-select">
                                                <option value="1" {{ $corrections->type_vision == 1 ? 'selected' : '' }}>Vision de Loin</option>
                                                <option value="2" {{ $corrections->type_vision == 2 ? 'selected' : '' }}>Vision de Près</option>
                                                <option value="3" {{ $corrections->type_vision == 3 ? 'selected' : '' }}>Bifocale</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Prescription Details -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Détails de la Prescription</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
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
                                                <td class="text-center">
                                                    <input type="text" name="sph_od" class="form-control text-center" value="{{ $corrections->sph_od }}">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" name="sph_og" class="form-control text-center" value="{{ $corrections->sph_og }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Cylinder (CYL)</td>
                                                <td class="text-center">
                                                    <input type="text" name="cly_od" class="form-control text-center" value="{{ $corrections->cly_od }}">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" name="cly_og" class="form-control text-center" value="{{ $corrections->cly_og }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">Axis (AXI)</td>
                                                <td class="text-center">
                                                    <input type="text" name="axe_od" class="form-control text-center" value="{{ $corrections->axe_od }}">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" name="axe_og" class="form-control text-center" value="{{ $corrections->axe_og }}">
                                                </td>
                                            </tr>
                                            @if($corrections->type_vision == 2)
                                            <tr>
                                                <td class="fw-bold">Add</td>
                                                <td class="text-center">
                                                    <input type="text" name="add_od" class="form-control text-center" value="{{ $corrections->add_od }}">
                                                </td>
                                                <td class="text-center">
                                                    <input type="text" name="add_og" class="form-control text-center" value="{{ $corrections->add_og }}">
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">PD (Pupillary Distance)</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Distance</label>
                                            <input type="text" name="PD" class="form-control" value="{{ $corrections->PD }}">
                                        </div>
                                        @if($corrections->Near_Pd)
                                        <div class="mb-3">
                                            <label class="form-label">Près</label>
                                            <input type="text" name="Near_Pd" class="form-control" value="{{ $corrections->Near_Pd }}">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Monture</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Marque</label>
                                            <select name="monture_id" class="form-select">
                                                @foreach($montures as $monture)
                                                    <option value="{{ $monture->id }}" {{ $corrections->monture_id == $monture->id ? 'selected' : '' }}>
                                                        {{ $monture->marque_monture }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Option</label>
                                            <input type="text" name="option" class="form-control" value="{{ $corrections->option }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class='bx bx-save me-1'></i> Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 