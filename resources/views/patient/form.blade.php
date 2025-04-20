<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $patient->nom ?? old('nom') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $patient->prenom ?? old('prenom') }}" required>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ isset($patient) ? $patient->date_naissance->format('Y-m-d') : old('date_naissance') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $patient->telephone ?? old('telephone') }}" required>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $patient->email ?? old('email') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="groupe_sanguin">Groupe Sanguin</label>
            <select class="form-control" id="groupe_sanguin" name="groupe_sanguin">
                <option value="">Sélectionner un groupe sanguin</option>
                <option value="A+" {{ (isset($patient) && $patient->groupe_sanguin == 'A+') || old('groupe_sanguin') == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ (isset($patient) && $patient->groupe_sanguin == 'A-') || old('groupe_sanguin') == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ (isset($patient) && $patient->groupe_sanguin == 'B+') || old('groupe_sanguin') == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ (isset($patient) && $patient->groupe_sanguin == 'B-') || old('groupe_sanguin') == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ (isset($patient) && $patient->groupe_sanguin == 'AB+') || old('groupe_sanguin') == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ (isset($patient) && $patient->groupe_sanguin == 'AB-') || old('groupe_sanguin') == 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ (isset($patient) && $patient->groupe_sanguin == 'O+') || old('groupe_sanguin') == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ (isset($patient) && $patient->groupe_sanguin == 'O-') || old('groupe_sanguin') == 'O-' ? 'selected' : '' }}>O-</option>
            </select>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="form-group">
            <label for="allergies">Allergies</label>
            <textarea class="form-control" id="allergies" name="allergies" rows="2">{{ $patient->allergies ?? old('allergies') }}</textarea>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="form-group">
            <label for="antecedents">Antécédents</label>
            <textarea class="form-control" id="antecedents" name="antecedents" rows="3">{{ $patient->antecedents ?? old('antecedents') }}</textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col mb-3">
        <label for="adresse" class="form-label">Adresse</label>
        <textarea class="form-control @error('adresse') is-invalid @enderror" 
            id="adresse" name="adresse">{{ old('adresse') }}</textarea>
        @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>