@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dossier /</span> Facture</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
            Crée Une Facture
        </button>
        <div class="table-responsive text-nowrap">
            <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel4">Nouvelle Facture</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body" id="myform">
                                @include('facture.form')
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
        <!-- Responsive Table -->
        <div class="card mt-2">
            <h5 class="card-header">Tabeau des factures</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>FACTURE POUR</th>
                            {{-- <th>REFERENCE</th> --}}
                            <th>N° FACTURE</th>
                            <th>DATE</th>
                            {{-- <th>DESIGNATION</th>
                            <th>QUANTITE</th>
                            <th>PRIX UNITAIRE</th> --}}
                            <th>MONTANT</th>
                            <th>TOTAL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($factures as $facture)
                            <tr>
                                <th scope="row">{{ $facture->id }}</th>
                                <td>{{ $facture->facture_pour }}</td>
                                {{-- <td>
                                    @foreach ($facture->ref as $reference)
                                        <li>{{ $reference }}</li>
                                    @endforeach
                                </td> --}}
                                <td>{{ $facture->n_facture }}</td>
                                <td>{{ $facture->date }}</td>
                                {{-- <td>
                                    @foreach ($facture->designation as $designation)
                                        <li>{{ $designation }}</li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($facture->quantite as $quantite)
                                        <li>{{ $quantite }}</li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($facture->p_unitaire as $p_unitaire)
                                        <li>{{ $p_unitaire }}</li>
                                    @endforeach
                                </td> --}}
                                <td>{{ $facture->montant }}</td>
                                <td>{{ $facture->total }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="factureShow/{{ $facture['id'] }}"><i
                                                    class="bx bx-show me-1"></i> Show</a>
                                            <a class="dropdown-item" href="factureEdit/{{ $facture['id'] }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="facture/delete/{{ $facture['id'] }}"><i
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
        <!--/ Table within card -->
    </div>
    <script>
        const currentLocation = location.pathname.split('/')[1];
        const menuItem = document.querySelectorAll('.menu-item');
        document.querySelector('.menu-item').classList.remove('active')
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].innerText.toLowerCase().replace(/\s/g, "") === currentLocation) {
                document.querySelector('#open').classList.add('open', 'active');
                menuItem[i].classList.add('active');
            }
        }
    </script>
@endsection
