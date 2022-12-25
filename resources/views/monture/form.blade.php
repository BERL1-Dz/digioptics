<div class="row">
    <div class="col">
        <label for="emailWithTitle" class="form-label">Code Fournisseur:</label>
        <select name="code_fournisseur" class="form-control">
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->code_fournisseur }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col">
        <label for="emailWithTitle" class="form-label">Nom Fournisseur:</label>
        <select name="nom_fournisseur" class="form-control">
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Code Monture:</label>
        <input type="text" id="emailWithTitle" class="form-control" placeholder="048700" name="code_monture" />
    </div>
</div>

<div class="row">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Marque</label>
        <input type="text" id="emailWithTitle" class="form-control" placeholder="ARMANI" required name="marque_monture" />
    </div>

</div>
<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Material:</label>
        <input type="text" id="emailWithTitle" class="form-control" placeholder="Organique" required
            name="matiere_monture" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Taille:</label>
        <input type="number" id="dobWithTitle" class="form-control" placeholder="60 Ø" required name="taille_monture" />
    </div>
</div>
<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Model:</label>
          <input type="text" id="emailWithTitle" class="form-control" placeholder="AR 101M" required name="model_monture" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Coloris :</label>
        <input type="text" id="dobWithTitle" class="form-control" placeholder="319831" name="coloris" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Coloris Libellé: </label>
        <input type="text" id="dobWithTitle" class="form-control" placeholder="BLACK" name="coloris libellé" />
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Style: </label>
        <input type="text" id="emailWithTitle" class="form-control" placeholder="Traditionnel" required name="style_monture" />
    </div>
</div>
<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Gener: </label>
        <input type="text" id="emailWithTitle" class="form-control" placeholder="HOMME" required name="genre_monture" />
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Pa_Monture</label>
        <input type="number" id="dobWithTitle" class="form-control" placeholder="Pa_Verre" required name="pa_monture" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Pv_Monture</label>
        <input type="number" id="dobWithTitle" class="form-control" placeholder="Pv_Verre" required name="pv_monture" />
    </div>
</div>
