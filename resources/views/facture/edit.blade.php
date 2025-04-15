@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y" role="document">
        <div class="modal-content card">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Modifier Facture</h5>
                <a href="{{ route('facture.index') }}"><button type="button" class="btn" data-bs-dismiss="modal" aria-label="Retour"><i
                            class='bx bx-left-arrow-alt'></i></button></a>
            </div>
            <form action="{{ route('facture.update', $data['id']) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body" id="myform">
                    <div class="col mb-0">
                        <label for="nameExLarge" class="form-label">Facture Pour:</label>
                        <input type="text" id="nameExLarge" class="form-control" placeholder="Facture Pour"
                            name="facture_pour" required value="{{ $data['facture_pour'] }}" />
                    </div>
                    <div class="col mb-0" id="ref_input">
                        <label for="nameExLarge" class="form-label">Ref.</label>
                        <div style="display:flex;align-items: baseline;">
                            <button id="rowAdder_ref" type="button" class="btn btn-success valval"
                                style="border-radius: 5px 5px 5px 5px;">
                                <i class="bx bxs-plus-square"></i>
                            </button>
                        </div>
                        <div id="newinput_ref">
                            @foreach ($data['ref'] as $key => $arrayData)
                                <div id="row">
                                    <div class="input-group mb-2 mt-2"><input id="ref_{{ $key }}"
                                            placeholder="Ref." name="ref[]" type="text" class="form-control m-input"
                                            required value='{{ $arrayData }}'>
                                        <div class="input-group-prepend"><button class="btn btn-danger" id="DeleteRow_ref"
                                                type="button" style="border-radius: 0px 5px 5px 0;"><i
                                                    class="bi bi-trash"></i></button> </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="nameExLarge" class="form-label">N° Facture:</label>
                            <input type="number" id="nameExLarge" class="form-control" placeholder="N° Facture"
                                name="n_facture" required value="{{ $data['n_facture'] }}">
                        </div>

                        <div class="col mb-0">
                            <label for="dobExLarge" class="form-label">Date</label>
                            <input type="text" id="dobExLarge" class="form-control" placeholder="DD / MM / YY"
                                name="date" required value="{{ $data['date'] }}">
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailExLarge" class="form-label">Designation</label>
                            <div style="display:flex;align-items: baseline;">
                                <button id="rowAdder_des" type="button" class="btn btn-success valval"
                                    style="border-radius: 5px 5px 5px 5px;">
                                    <i class="bx bxs-plus-square"></i>
                                </button>
                            </div>
                            <div id="newinput_des">
                                @foreach ($data['designation'] as $key => $arrayData)
                                    <div id="row">
                                        <div class="input-group mb-2 mt-2"><input id="designation_{{ $key }}"
                                                placeholder="Designation" name="designation[]" type="text"
                                                class="form-control m-input" required value='{{ $arrayData }}'>
                                            <div class="input-group-prepend"><button class="btn btn-danger"
                                                    id="DeleteRow_des" type="button"
                                                    style="border-radius: 0px 5px 5px 0;"><i
                                                        class="bi bi-trash"></i></button> </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col mb-0">
                            <label for="dobExLarge" class="form-label">Quantite</label>
                            <div style="display:flex;align-items: baseline;">
                                <button id="rowAdder_quantite" type="button" class="btn btn-success valval"
                                    style="border-radius: 5px 5px 5px 5px;">
                                    <i class="bx bxs-plus-square"></i>
                                </button>
                            </div>
                            <div id="newinput_quantite">
                                @foreach ($data['quantite'] as $key => $arrayData)
                                    <div id="row">
                                        <div class="input-group mb-2 mt-2"><input id="quantite_{{ $key }}"
                                                placeholder="Quantite" name="quantite[]" type="text"
                                                class="form-control m-input" required value='{{ $arrayData }}'>
                                            <div class="input-group-prepend"><button class="btn btn-danger"
                                                    id="DeleteRow_quantite" type="button"
                                                    style="border-radius: 0px 5px 5px 0;"><i
                                                        class="bi bi-trash"></i></button> </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailExLarge" class="form-label">Prix Unitaire</label>
                            <div style="display:flex;align-items: baseline;">
                                <button id="rowAdder_p-uni" type="button" class="btn btn-success valval"
                                    style="border-radius: 5px 5px 5px 5px;">
                                    <i class="bx bxs-plus-square"></i>
                                </button>
                            </div>
                            <div id="newinput_p-uni">
                                @foreach ($data['p_unitaire'] as $key => $arrayData)
                                    <div id="row">
                                        <div class="input-group mb-2 mt-2"><input id="p_unitaire_{{ $key }}"
                                                placeholder="Prix Unitaire" name="p_unitaire[]" type="text"
                                                class="form-control m-input" required value='{{ $arrayData }}'>
                                            <div class="input-group-prepend"><button class="btn btn-danger"
                                                    id="DeleteRow_p-uni" type="button"
                                                    style="border-radius: 0px 5px 5px 0;"><i
                                                        class="bi bi-trash"></i></button> </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col mb-0">
                            <label for="dobExLarge" class="form-label">Montant</label>
                            <div style="display:flex;align-items: baseline;">
                                <button id="rowAdder_montant" type="button" class="btn btn-success valval"
                                    style="border-radius: 5px 5px 5px 5px;">
                                    <i class="bx bxs-plus-square"></i>
                                </button>
                            </div>
                            <div id="newinput_montant">
                                @foreach ($data['montant'] as $key => $arrayData)
                                    <div id="row">
                                        <div class="input-group mb-2 mt-2"><input id="montant_{{ $key }}"
                                                placeholder="Montant" name="montant[]" type="text"
                                                class="form-control m-input" required value='{{ $arrayData }}'>
                                            <div class="input-group-prepend"><button class="btn btn-danger"
                                                    id="DeleteRow_montant" type="button"
                                                    style="border-radius: 0px 5px 5px 0;"><i
                                                        class="bi bi-trash"></i></button> </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailExLarge" class="form-label">T.H.T</label>
                            <input type="number" id="emailExLarge" class="form-control" placeholder="T.H.T"
                                name="t_h_t" value="{{ $data['t_h_t'] }}">
                        </div>
                        <div class="col mb-0">
                            <label for="dobExLarge" class="form-label">T.V.A %</label>
                            <input type="number" id="dobExLarge" class="form-control" placeholder="T.V.A % "
                                name="t_v_a_p" value="{{ $data['t_v_a_p'] }}">
                        </div>

                        <div class="col mb-0">
                            <label for="dobExLarge" class="form-label">T.V.A</label>
                            <input type="number" id="dobExLarge" class="form-control" placeholder="T.V.A "
                                name="t_v_a" value="{{ $data['t_v_a'] }}">
                        </div>

                        <div class="col mb-0">
                            <label for="nameExLarge" class="form-label">T.T.C</label>
                            <input type="number" id="nameExLarge" class="form-control" placeholder="T.T.C" name="t_t_c"
                            required value="{{ $data['t_t_c'] }}">
                        </div>
                    </div>

                    <div class="col mb-0">
                        <label for="nameExLarge" class="form-label">Total</label>
                        <input type="number" id="nameExLarge" class="form-control" placeholder="Total" name="total"
                            required value="{{ $data['total'] }}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Sauvgarder</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Add row functionality for all sections
        document.addEventListener('DOMContentLoaded', function() {
            // Reference section
            $("#rowAdder_ref").click(function() {
                newRowAdd = '<div id="row"> <div class="input-group mb-2 mt-2">' +
                    '<input type="text" class="form-control m-input" placeholder="Ref." name="ref[]">' +
                    '<div class="input-group-prepend">' +
                    '<button class="btn btn-danger" id="DeleteRow_ref" type="button">' +
                    '<i class="bi bi-trash"></i></button> </div> </div> </div>';
                $('#newinput_ref').append(newRowAdd);
            });

            // Designation section
            $("#rowAdder_des").click(function() {
                newRowAdd = '<div id="row"> <div class="input-group mb-2 mt-2">' +
                    '<input type="text" class="form-control m-input" placeholder="Designation" name="designation[]">' +
                    '<div class="input-group-prepend">' +
                    '<button class="btn btn-danger" id="DeleteRow_des" type="button">' +
                    '<i class="bi bi-trash"></i></button> </div> </div> </div>';
                $('#newinput_des').append(newRowAdd);
            });

            // Quantity section
            $("#rowAdder_quantite").click(function() {
                newRowAdd = '<div id="row"> <div class="input-group mb-2 mt-2">' +
                    '<input type="text" class="form-control m-input" placeholder="Quantite" name="quantite[]">' +
                    '<div class="input-group-prepend">' +
                    '<button class="btn btn-danger" id="DeleteRow_quantite" type="button">' +
                    '<i class="bi bi-trash"></i></button> </div> </div> </div>';
                $('#newinput_quantite').append(newRowAdd);
            });

            // Price section
            $("#rowAdder_p-uni").click(function() {
                newRowAdd = '<div id="row"> <div class="input-group mb-2 mt-2">' +
                    '<input type="text" class="form-control m-input" placeholder="Prix Unitaire" name="p_unitaire[]">' +
                    '<div class="input-group-prepend">' +
                    '<button class="btn btn-danger" id="DeleteRow_p-uni" type="button">' +
                    '<i class="bi bi-trash"></i></button> </div> </div> </div>';
                $('#newinput_p-uni').append(newRowAdd);
            });

            // Amount section
            $("#rowAdder_montant").click(function() {
                newRowAdd = '<div id="row"> <div class="input-group mb-2 mt-2">' +
                    '<input type="text" class="form-control m-input" placeholder="Montant" name="montant[]">' +
                    '<div class="input-group-prepend">' +
                    '<button class="btn btn-danger" id="DeleteRow_montant" type="button">' +
                    '<i class="bi bi-trash"></i></button> </div> </div> </div>';
                $('#newinput_montant').append(newRowAdd);
            });

            // Delete row functionality for all sections
            $("body").on("click", "#DeleteRow_ref", function() {
                $(this).parents("#row").remove();
            });
            $("body").on("click", "#DeleteRow_des", function() {
                $(this).parents("#row").remove();
            });
            $("body").on("click", "#DeleteRow_quantite", function() {
                $(this).parents("#row").remove();
            });
            $("body").on("click", "#DeleteRow_p-uni", function() {
                $(this).parents("#row").remove();
            });
            $("body").on("click", "#DeleteRow_montant", function() {
                $(this).parents("#row").remove();
            });
        });
    </script>
@endsection
