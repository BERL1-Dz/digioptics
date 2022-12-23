@extends('layouts.app')
@section('content')
    <!-- Vertically Centered Modal -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Ajouter un Fournisseur
        </button>

        <!-- Modal -->
        <div class="table-responsive text-nowrap">
            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Formulaire fournisseur</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="" action="{{ url('create_fournisseur') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                @include('fournisseur.form')
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
        </div>
        <div class="table-responsive text-nowrap mt-3">
            <table class="table card-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Code Fournisseur</th>
                        <th>Fabricant associe</th>
                        <th>Telephone</th>
                        <th>Mail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($fournisseurs as $fournisseur)
                        <tr>
                            <th scope="row">{{ $fournisseur->id }}</th>
                            <td>{{ $fournisseur->nom }}</td>
                            <td>{{ $fournisseur->code_fournisseur }}</td>
                            <td>{{ $fournisseur->fabricant_associe }}</td>
                            <td>{{ $fournisseur->numero_fournisseur }}</td>
                            <td>{{ $fournisseur->mail_fournisseur }}</td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href=""><i class="bx bx-show me-1"></i> Show</a>
                                        <a class="dropdown-item" href="fournisseurEdit/{{ $fournisseur['id'] }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="fournisseur/delete/{{ $fournisseur['id'] }}"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script>
        const currentLocation = location.pathname.split('/')[1];
        const menuItem = document.querySelectorAll('.menu-item');
        document.querySelector('.menu-item').classList.remove('active')
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            console.log(menuItem[2].innerText.replace(/\s/g, ""));
            if (menuItem[i].innerText.toLowerCase().replace(/\s/g, "") === currentLocation) {
                document.querySelector('#open').classList.add('open', 'active');
                menuItem[i].classList.add('active');
            }
        }
    </script>
@endsection
