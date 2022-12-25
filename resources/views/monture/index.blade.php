@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Vertically Centered Modal -->

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Nouveau Monture
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Formulaire Monture</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('create_monture') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            @include('monture.form')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap mt-3">
            <table class="table card-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Code Monture</th>
                        <th>Code Fournisseur</th>
                        <th>Nom Fournisseur</th>
                        <th>Taille</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Coloris</th>
                        <th>Coloris Libellé</th>
                        <th>Style</th>
                        <th>Genre</th>
                        <th>Prix d'achat </th>
                        <th>Prix de vents</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($montures as $monture)
                        <tr>
                            <th scope="row">{{ $monture->id }}</th>
                            <th scope="row">{{ $monture->code_monture }}</th>
                            <th scope="row">{{ $monture->fournisseurs->code_fournisseur }}</th>
                            <th scope="row">{{ $monture->fournisseurs->nom}}</th>
                            <th scope="row">{{ $monture->taille_monture }}</th>
                            <th scope="row">{{ $monture->model_monture }}</th>
                            <th scope="row">{{ $monture->type_monture }}</th>
                            <th scope="row">{{ $monture->coloris }}</th>
                            <th scope="row">{{ $monture->coloris_libellé }}</th>
                            <th scope="row">{{ $monture->style_monture }}</th>
                            <th scope="row">{{ $monture->genre_monture }}</th>
                            <th scope="row">{{ $monture->pa_monture }}</th>
                            <th scope="row">{{ $monture->pv_monture }}</th>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href=""><i class="bx bx-show me-1"></i> Show</a>
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href=""><i class="bx bx-trash me-1"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
