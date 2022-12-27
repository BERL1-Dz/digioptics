@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Vertically Centered Modal -->

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
        Nouveau lenttile
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Formulaire lenttile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('create_lenttile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @include('lenttile.form')
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
                    <th>Essie</th>
                    <th>Conditionnement</th>
                    <th>Prix de vents</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($lenttiles as $lenttile)
                    <tr>
                        <th scope="row">{{ $lenttile->id }}</th>
                        <th scope="row">{{ $lenttile->fournisseur->nom }}</th>
                        <th scope="row">{{ $lenttile->fabriquant_lentille }}</th>
                        <th scope="row">{{ $lenttile->libellé}}</th>
                        <th scope="row">{{ $lenttile->port }}</th>
                        <th scope="row">{{ $lenttile->teinte }}</th>
                        <th scope="row">
                          @if ($lenttile->essie === 1)

                            OUI

                          @else

                              NON

                          @endif
                        </th>
                        <th scope="row">{{ $lenttile->conditionnement }}</th>
                        <th scope="row">{{ $lenttile->pv_lentille }}</th>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href=""><i class="bx bx-show me-1"></i> Show</a>
                                    <a class="dropdown-item" href="lenttileEdit/{{ $lenttile['id'] }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="lenttile/delete/{{ $lenttile['id'] }}"><i
                                            class="bx bx-trash me-1"></i>Delete</a>
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
