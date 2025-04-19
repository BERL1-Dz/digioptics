@extends('layouts.app')
@section('content')
    <!-- Vertically Centered Modal -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3"><span class="text-muted fw-light">Dossier /</span> Fournisseur</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Nouveau Fournisseur
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
        <div class="card mt-2">
            <h5 class="card-header">Tabeau des fournisseurs</h5>
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
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('fournisseur.show', $fournisseur) }}" class="btn btn-sm btn-info" title="Voir">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="{{ route('fournisseur.edit', $fournisseur) }}" class="btn btn-sm btn-primary" title="Modifier">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <form action="{{ route('fournisseur.destroy', $fournisseur) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')">
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
