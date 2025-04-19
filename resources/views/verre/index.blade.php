@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Vertically Centered Modal -->

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Nouveau verre
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Formulaire Verre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('create_verre') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            @include('verre.form')
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
                    @foreach ($verres as $verre)
                        <tr>
                            <th scope="row">{{ $verre->id }}</th>
                            <th scope="row">{{ $verre->code_verre }}</th>
                            <th scope="row">{{ $verre->fournisseur->nom }}</th>
                            <th scope="row">{{ $verre->index_verre }}</th>
                            <th scope="row">{{ $verre->material }}</th>
                            <th scope="row">{{ $verre->diametre }}</th>
                            <th scope="row">{{ $verre->surface }}</th>
                            <th scope="row">{{ $verre->sph }}</th>
                            <th scope="row">{{ $verre->cly }}</th>
                            <th scope="row">{{ $verre->option }}</th>
                            <th scope="row">{{ $verre->pa_verre }}</th>
                            <th scope="row">{{ $verre->pv_verre }}</th>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="verre/{{ $verre->id }}" class="btn btn-sm btn-info" title="Voir">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="verreEdit/{{ $verre->id }}" class="btn btn-sm btn-primary" title="Modifier">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="verre/delete/{{ $verre->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce verre ?')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
