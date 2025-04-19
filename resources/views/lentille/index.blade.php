@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Vertically Centered Modal -->

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Nouveau Lentilles
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Formulaire lentilles</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('create_lentille') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            @include('lentille.form')
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
                        <th>Fournisseur</th>
                        <th>Fabricant</th>
                        <th>Libellé</th>
                        <th>Port</th>
                        <th>Teinte</th>
                        <th>Neuf</th>
                        <th>Conditionnement</th>
                        <th>Prix de vents</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($lentilles as $lentille)
                        <tr>
                            <th scope="row">{{ $lentille->id }}</th>
                            <th scope="row">{{ $lentille->fournisseur->nom }}</th>
                            <th scope="row">{{ $lentille->fabriquant_lentille }}</th>
                            <th scope="row">{{ $lentille->libellé }}</th>
                            <th scope="row">{{ $lentille->port }}</th>
                            <th scope="row">{{ $lentille->teinte }}</th>
                            <th scope="row">
                                @if ($lentille->essie === 1)
                                    OUI
                                @else
                                    NON
                                @endif
                            </th>
                            <th scope="row">{{ $lentille->conditionnement }}</th>
                            <th scope="row">{{ $lentille->pv_lentille }}</th>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="lentille/{{ $lentille->id }}" class="btn btn-sm btn-info" title="Voir">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="lentilleEdit/{{ $lentille->id }}" class="btn btn-sm btn-primary" title="Modifier">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="lentille/delete/{{ $lentille->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette lentille ?')">
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
