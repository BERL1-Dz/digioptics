<div class="row">
  Code Fournisseur:
  <select name="category_id" class="form-control" id="cat_name">
    @foreach($fournisseurs as $fournisseur)
      <option value="{{$fournisseur->id}}">{{$fournisseur->code_fournisseur}}</option>
    @endforeach
    </select>
</div>

<div class="row">
<div class="col mb-0">
    <label for="emailWithTitle" class="form-label"> Code verre</label>
    <input type="text" id="emailWithTitle" class="form-control"
        placeholder="048700" />
</div>

</div>
<div class="row">
<div class="col mb-0">
    <label for="emailWithTitle" class="form-label"> Verre Indic</label>
    <input type="text" id="emailWithTitle" class="form-control"
        placeholder="1.67" />
</div>

</div>
<div class="row g-2">
    <div class="col mb-0">
        <label for="emailWithTitle" class="form-label">Material</label>
        <input type="text" id="emailWithTitle" class="form-control"
            placeholder="Metal" />
    </div>
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Diameter</label>
        <input type="number" id="dobWithTitle" class="form-control"
            placeholder="60 Ø" />
    </div>
</div>
<div class="row g-2">
    <div class="col mb-0">
        <label for="emailWithTitle" class="form-label">Surface</label>
        <input type="text" id="emailWithTitle" class="form-control"
            placeholder="Surface" />
    </div>
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Sphére</label>
        <input type="number" id="dobWithTitle" class="form-control"
            placeholder="Sph" />
    </div>
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Clynder</label>
        <input type="number" id="dobWithTitle" class="form-control"
            placeholder="Cly" />
    </div>
</div>

<div class="row g-2">
<div class="col mb-0">
    <label for="emailWithTitle" class="form-label">Option</label>
    <input type="text" id="emailWithTitle" class="form-control"
        placeholder="Anti-Réflt" />
</div>
</div>

<div class="row g-2">
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Pa_Verre</label>
        <input type="number" id="dobWithTitle" class="form-control"
            placeholder="Pa_Verre" />
    </div>
    <div class="col mb-0">
        <label for="dobWithTitle" class="form-label">Pv_Verre</label>
        <input type="number" id="dobWithTitle" class="form-control"
            placeholder="Pv_Verre" />
    </div>
</div>
