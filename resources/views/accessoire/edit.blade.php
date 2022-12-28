@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y" role="document">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel4">Modifier Accessoire</h5>
            <a href="/accessoire"><button type="button" class="btn" data-bs-dismiss="modal" aria-label="Retour"><i
                        class='bx bx-left-arrow-alt'></i></button></a>
        </div>
        <form action="{{ url('accessoire/update/' . $data->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body" id="myform">
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
                      <input type="text"
                       class="form-control"
                       placeholder="essuie"
                       required name="model"
                       value="{{ $data['marque'] }}"
                       />
                  </div>
                  <div class="col mt-1">
                      <label for="dobWithTitle" class="form-label">Marque: </label>
                      <input type="text"
                       id="dobWithTitle"
                        class="form-control"
                         placeholder="PureVision 6L"
                         required
                          name="marque"
                          value="{{ $data['marque'] }}"
                           />
                  </div>
              </div>

              <div class="row mt-1 g-2">
                  <div class="col mt-1">
                      <label for="emailWithTitle" class="form-label">Prix: </label>
                      <input type="number" class="form-control" placeholder="1" required name="prix" value="{{ $data['prix'] }}"/>
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
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Sauvgarder</button>
            </div>
        </form>
    </div>
</div>

@endsection
