<div class="row">
    <div class="col">
        <label for="emailWithTitle" class="form-label">Code Fournisseur:</label>
        <select name="code_fournisseur" class="form-control" required>
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->code_fournisseur }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Code verre:</label>
        <input type="number" class="form-control" placeholder="048700" name="code_verre" / required>
    </div>

</div>
<div class="row">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Verre Indic:</label>
        <input type="number" class="form-control" placeholder="1.67" required name="index_verre" />
    </div>

</div>
<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Material:</label>
        <input type="text" class="form-control" placeholder="Organique" required name="material" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Diametre:</label>
        <input type="number" id="dobWithTitle" class="form-control" placeholder="60 Ø" required name="diametre" />
    </div>
</div>
<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Surface</label>
        <input type="text" class="form-control" placeholder="Surface" required name="surface" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Sphére:</label>
        <input type="text" id="dobWithTitle" class="form-control" placeholder="Sph" name="sph" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Clynder:</label>
        <input type="text" id="dobWithTitle" class="form-control" placeholder="Cly" name="cly" />
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Option:</label>
        <input type="text" class="form-control" placeholder="Anti-Réflt" required name="option" />
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Pa_Verre</label>
        <input type="number" id="dobWithTitle" class="form-control" placeholder="Pa_Verre" required name="pa_verre" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Pv_Verre</label>
        <input type="number" id="dobWithTitle" class="form-control" placeholder="Pv_Verre" required name="pv_verre" />
    </div>
</div>
