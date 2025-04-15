@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Paramètres /</span> Modifier les informations de l'opticien</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Modifier les informations</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('opticien-info.update', $opticienInfo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="nom_entreprise">Nom de l'entreprise <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nom_entreprise') is-invalid @enderror" 
                                   id="nom_entreprise" name="nom_entreprise" value="{{ old('nom_entreprise', $opticienInfo->nom_entreprise) }}" required>
                            @error('nom_entreprise')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="adresse">Adresse <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('adresse') is-invalid @enderror" 
                                      id="adresse" name="adresse" required>{{ old('adresse', $opticienInfo->adresse) }}</textarea>
                            @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="telephone">Téléphone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" 
                                   id="telephone" name="telephone" value="{{ old('telephone', $opticienInfo->telephone) }}" required>
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $opticienInfo->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="site_web">Site web</label>
                            <input type="url" class="form-control @error('site_web') is-invalid @enderror" 
                                   id="site_web" name="site_web" value="{{ old('site_web', $opticienInfo->site_web) }}">
                            @error('site_web')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="siret">Numéro SIRET</label>
                            <input type="text" class="form-control @error('siret') is-invalid @enderror" 
                                   id="siret" name="siret" value="{{ old('siret', $opticienInfo->siret) }}">
                            @error('siret')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="tva">Numéro TVA</label>
                            <input type="text" class="form-control @error('tva') is-invalid @enderror" 
                                   id="tva" name="tva" value="{{ old('tva', $opticienInfo->tva) }}">
                            @error('tva')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="logo">Logo</label>
                            @if($opticienInfo->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $opticienInfo->logo) }}" alt="Logo actuel" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                                   id="logo" name="logo" accept="image/*">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save"></i> Enregistrer les modifications
                    </button>
                    <a href="{{ route('opticien-info.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 