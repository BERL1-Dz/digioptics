<div class="row">
  Code Fournisseur:
  <select name="code_fournisseur" class="form-control">
    @foreach($fournisseurs as $fournisseur)
      <option value="{{$fournisseur->id}}">{{$fournisseur->code_fournisseur}}</option>
    @endforeach
    </select>
</div>

<div class="row">
<div class="col mb-0">
    <label for="emailWithTitle" class="form-label"> Code verre</label>
    <input type="text" id="emailWithTitle" class="form-control"
    placeholder="048700"
    required
    name="code_verre"
    />
</div>

</div>
<div class="row">
<div class="col mb-0">
    <label for="emailWithTitle" class="form-label"> Verre Indic</label>
    <input type="text" id="emailWithTitle" class="form-control"
    placeholder="1.67"
    required
    name="index_verre"/>
</div>

</div>
<div class="row g-2">
    <div class="col mb-0">
        <label for="emailWithTitle" class="form-label">Material</label>
        <input type="text" id="emailWithTitle" class="form-control"
            placeholder="Organique"
            required
            name="material"/>
    </div>
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Diametre</label>
        <input type="number" id="dobWithTitle" class="form-control"
        placeholder="60 Ø"
        required
        name="diametre"/>
    </div>
</div>
<div class="row g-2">
    <div class="col mb-0">
        <label for="emailWithTitle" class="form-label">Surface</label>
        <input type="text" id="emailWithTitle" class="form-control"
        placeholder="Surface"
        required
        name="surface"/>
    </div>
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Sphére</label>
        <input type="text" id="dobWithTitle" class="form-control"
            placeholder="Sph"
            required
            name="sph"/>
    </div>
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Clynder</label>
        <input type="text" id="dobWithTitle" class="form-control"
            placeholder="Cly"
            required
            name="cly" />
    </div>
</div>

<div class="row g-2">
<div class="col mb-0">
    <label for="emailWithTitle" class="form-label">Option</label>
    <input type="text" id="emailWithTitle" class="form-control"
        placeholder="Anti-Réflt"
        required
        name="option"/>
</div>
</div>

<div class="row g-2">
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Pa_Verre</label>
        <input type="number" id="dobWithTitle" class="form-control"
            placeholder="Pa_Verre"
            required
            name="pa_verre"/>
    </div>
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Pv_Verre</label>
        <input type="number" id="dobWithTitle" class="form-control"
            placeholder="Pv_Verre"
            required
            name="pv_verre"/>
    </div>
</div>
