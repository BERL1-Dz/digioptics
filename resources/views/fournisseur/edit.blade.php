@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y" role="document">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel4">Modifier Fournisseur</h5>
            <a href="/fournisseur"><button type="button" class="btn" data-bs-dismiss="modal" aria-label="Retour"><i
                        class='bx bx-left-arrow-alt'></i></button></a>
        </div>
        <form action="{{ url('fournisseur/update/' . $data->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Code</label>
                <input
                  type="text"
                  id="nameWithTitle"
                  class="form-control"
                  placeholder="Code"
                  required value="{{ $data['code_fournisseur'] }}"
                  name="code_fournisseur"
                />
              </div>
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Nom</label>
                <input
                  type="text"
                  required value="{{ $data['nom'] }}"
                  id="nameWithTitle"
                  class="form-control"
                  placeholder="Nom"
                  name="nom"
                />
              </div>
              <div class="col mb-3">
                <label for="nameWithTitle" class="form-label">Fabricant associé</label>
                <input
                  type="text"
                  required value="{{ $data['fabricant_associe'] }}"
                  id="nameWithTitle"
                  class="form-control"
                  placeholder="Fabricant associé"
                  name="fabricant_associe"
                />
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailWithTitle" class="form-label">Email</label>
                <input
                  type="text"
                  id="emailWithTitle"
                  class="form-control"
                  required value="{{ $data['mail_fournisseur'] }}"
                  placeholder="xxxx@xxx.xx"
                  name="mail_fournisseur"
                />
              </div>
              <div class="col mb-0">
                <label for="emailWithTitle" class="form-label">Telephone</label>
                <input
                  type="text"
                  id="emailWithTitle"
                  class="form-control"
                  required value="{{ $data['numero_fournisseur'] }}"
                  placeholder="213666444333"
                  name="numero_fournisseur"
                />
              </div>

            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Sauvgarder</button>
            </div>
        </form>
    </div>
</div>
@endsection
