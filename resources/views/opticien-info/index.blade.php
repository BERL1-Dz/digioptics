@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Paramètres /</span> Informations de l'opticien</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Informations de l'opticien</h5>
            @if(!$opticienInfo)
                <a href="{{ route('opticien-info.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus"></i> Ajouter les informations
                </a>
            @endif
        </div>
        <div class="card-body">
            @if($opticienInfo)
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nom de l'entreprise</label>
                            <p class="form-control-static">{{ $opticienInfo->nom_entreprise }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Adresse</label>
                            <p class="form-control-static">{{ $opticienInfo->adresse }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Téléphone</label>
                            <p class="form-control-static">{{ $opticienInfo->telephone }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <p class="form-control-static">{{ $opticienInfo->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Site web</label>
                            <p class="form-control-static">{{ $opticienInfo->site_web }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Numéro SIRET</label>
                            <p class="form-control-static">{{ $opticienInfo->siret }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Numéro TVA</label>
                            <p class="form-control-static">{{ $opticienInfo->tva }}</p>
                        </div>
                        @if($opticienInfo->logo)
                            <div class="mb-3">
                                <label class="form-label">Logo</label>
                                <div>
                                    <img src="{{ asset('storage/' . $opticienInfo->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('opticien-info.edit', $opticienInfo) }}" class="btn btn-primary">
                        <i class="bx bx-edit"></i> Modifier
                    </a>
                </div>
            @else
                <div class="alert alert-info">
                    Aucune information n'a été enregistrée pour l'opticien.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 