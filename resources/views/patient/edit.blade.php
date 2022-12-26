@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y" role="document">
    <div class="modal-content card">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel4">Modifier Patient</h5>
            <a href="/facture"><button type="button" class="btn" data-bs-dismiss="modal" aria-label="Retour"><i
                        class='bx bx-left-arrow-alt'></i></button></a>
        </div>
        <form action="{{ url('patient/update/' . $data->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body" id="myform">

                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="nameExLarge" class="form-label">Prenom</label>
                        <input type="text" id="nameExLarge" class="form-control" placeholder=""
                            name="prenom" required value="{{ $data['prenom'] }}">
                    </div>

                    <div class="col mb-0">
                        <label for="dobExLarge" class="form-label">Nom</label>
                        <input type="text" id="dobExLarge" class="form-control" placeholder=""
                            name="nom" required value="{{ $data['nom'] }}">
                    </div>
                </div>
                <div class="row g-2">

                  <div class="col mb-0">
                      <label for="nameExLarge" class="form-label">Age</label>
                      <input type="number" id="nameExLarge" class="form-control" placeholder="" name="age"
                          required value="{{ $data['age'] }}">
                  </div>

                  <div class="col mb-0">
                      <label for="nameExLarge" class="form-label">Phone</label>
                      <input type="number" id="nameExLarge" class="form-control" placeholder="" name="age"
                          required value="{{ $data['phone'] }}">
                  </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Sauvgarder</button>
            </div>
        </form>
    </div>
</div>
@endsection
