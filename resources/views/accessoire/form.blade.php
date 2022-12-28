<div class="row">
    <div class="col">
        <label for="emailWithTitle" class="form-label">Categorie:</label>
        <select name="categorie_id" class="form-control" required>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nomination }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Model: </label>
        <input type="text" class="form-control" placeholder="essuie" required name="model" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Marque: </label>
        <input type="text" id="dobWithTitle" class="form-control" placeholder="PureVision 6L" required name="marque" />
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Prix: </label>
        <input type="number" class="form-control" placeholder="1" required name="prix" />
    </div>

</div>

<div class="row mt-1 g-2">
  <div class="col mt-1">
      <label for="emailWithTitle" class="form-label"> Gener: </label>
      <select name="genre" class="form-control">
          <option value="Homme">Homme</option>
          <option value="Homme">Femme</option>
      </select>
  </div>
</div>
