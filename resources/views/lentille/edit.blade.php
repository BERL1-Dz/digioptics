@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Modifier Lenttile</h5>
                <a href="/lentille"><button type="button" class="btn" data-bs-dismiss="modal" aria-label="Retour"><i
                            class='bx bx-left-arrow-alt'></i></button></a>
            </div>
            <form action="{{ url('lentille/update/' . $data->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body" id="myform">
                    <div class="row">
                        Code Fournisseur:
                        <select name="code_fournisseur" class="form-control">
                            @foreach ($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}" option selected="{{ $fournisseur->id }}">
                                    {{ $fournisseur->code_fournisseur }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label"> Fabricant: </label>
                            <input type="text" id="emailWithTitle" class="form-control" required
                                name="fabriquant_lentille" value="{{ $data['fabriquant_lentille'] }}" />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label"> Libellé: </label>
                            <input type="text" id="emailWithTitle" class="form-control" required name="libellé"
                                value="{{ $data['libellé'] }}" />
                        </div>

                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Port/Jour: </label>
                            <input type="number" id="emailWithTitle" class="form-control" required name="port"
                                value="{{ $data['port'] }}" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Teinte: </label>
                            <input type="text" id="dobWithTitle" class="form-control" required name="teinte"
                                value="{{ $data['teinte'] }}" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Essie: </label>
                            <input type="text" id="emailWithTitle" class="form-control" required name="essie"
                                value="{{ $data['essie'] }}" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Conditionnement</label>
                            <input type="text" id="dobWithTitle" class="form-control" required name="conditionnement"
                                value="{{ $data['conditionnement'] }}" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Pv_lentille</label>
                            <input type="text" id="dobWithTitle" class="form-control" required name="pv_lentille"
                                value="{{ $data['pv_lentille'] }}" />
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
