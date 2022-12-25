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
                        <th>Code</th>
                        <th>Fournisseur</th>
                        <th>Indic</th>
                        <th>Material</th>
                        <th>Diametre</th>
                        <th>Surface</th>
                        <th>SPH</th>
                        <th>CLY</th>
                        <th>Option</th>
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
                            <th scope="row">{{ $monture->fournisseur->nom }}</th>
                            <th scope="row">{{ $monture->fournisseur->code_fournisseur }}</th>
                            <th scope="row">{{ $monture->index_verre }}</th>
                            <th scope="row">{{ $monture->material }}</th>
                            <th scope="row">{{ $monture->diametre }}</th>
                            <th scope="row">{{ $monture->surface }}</th>
                            <th scope="row">{{ $monture->sph }}</th>
                            <th scope="row">{{ $monture->cly }}</th>
                            <th scope="row">{{ $monture->option }}</th>
                            <th scope="row">{{ $monture->pa_verre }}</th>
                            <th scope="row">{{ $monture->pv_verre }}</th>
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
