@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Modifier Patient</h5>
                <a href="/verre"><button type="button" class="btn" data-bs-dismiss="modal" aria-label="Retour"><i
                            class='bx bx-left-arrow-alt'></i></button></a>
            </div>
            <form action="{{ url('verre/update/' . $data->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body" id="myform">
                    <div class="row">
                        <div class="col mb-0">
                            Code Fournisseur:
                            <select name="code_fournisseur" class="form-control">
                                @foreach ($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}" option selected="{{ $fournisseur->id }}">
                                        {{ $fournisseur->code_fournisseur }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label"> Code verre</label>
                            <input type="text" id="emailWithTitle" class="form-control" placeholder="048700" required
                                name="code_verre" value="{{ $data['code_verre'] }}" />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label"> Verre Indic</label>
                            <input type="text" id="emailWithTitle" class="form-control" placeholder="1.67" required
                                name="index_verre" value="{{ $data['index_verre'] }}" />
                        </div>

                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Material</label>
                            <input type="text" id="emailWithTitle" class="form-control" placeholder="Metal" required
                                name="material" value="{{ $data['material'] }}" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Diametre</label>
                            <input type="number" id="dobWithTitle" class="form-control" placeholder="60 Ø" required
                                name="diametre" value="{{ $data['diametre'] }}" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Surface</label>
                            <input type="text" id="emailWithTitle" class="form-control" placeholder="Surface" required
                                name="surface" value="{{ $data['surface'] }}" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Sphére</label>
                            <input type="text" id="dobWithTitle" class="form-control" placeholder="Sph" required
                                name="sph" value="{{ $data['sph'] }}" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Clynder</label>
                            <input type="text" id="dobWithTitle" class="form-control" placeholder="Cly" required
                                name="cly" value="{{ $data['cly'] }}" />
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Option</label>
                            <input type="text" id="emailWithTitle" class="form-control" placeholder="Anti-Réflt" required
                                name="option" value="{{ $data['option'] }}" />
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Pa_Verre</label>
                            <input type="number" id="dobWithTitle" class="form-control" placeholder="Pa_Verre" required
                                name="pa_verre" value="{{ $data['pa_verre'] }}" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Pv_Verre</label>
                            <input type="number" id="dobWithTitle" class="form-control" placeholder="Pv_Verre" required
                                name="pv_verre" value="{{ $data['pv_verre'] }}" />
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
