<div class="row">
    <div class="col mb-3">
        <label for="nom" class="form-label">Nom: </label>
        <input type="text" id="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Nom" name="nom" required />
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col mb-0">
        <label for="prenom" class="form-label">Prénom: </label>
        <input type="text" id="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="Prénom" name="prenom" required />
        @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row g-2">
    <div class="col mb-3">
        <label for="telephone" class="form-label">Téléphone: </label>
        <input type="text" id="telephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="Téléphone" name="phone" maxlength="12" required />
        @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col mb-0">
        <label for="age" class="form-label">Âge: </label>
        <input type="number" id="age" class="form-control @error('age') is-invalid @enderror" placeholder="Âge" name="age" min="0" max="120" required />
        @error('age')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="adresse">Adresse</label>
    <textarea class="form-control @error('adresse') is-invalid @enderror" 
        id="adresse" name="adresse">{{ old('adresse') }}</textarea>
    @error('adresse')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>