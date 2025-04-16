@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dossier /</span> Correction Visuelle</h4>
        <!--Button-->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
            Nouvelle correction
        </button> --}}

        <div class="col-lg-4 col-md-6">
            <div class="mt-3">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScroll"
                    aria-controls="offcanvasScroll">
                    Nouvelle Correction Visuelle
                </button>
                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScroll" aria-labelledby="offcanvasScrollLabel"
                    style="width: 650px; box-shadow:1px 1px 3px 1px">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasScrollLabel" class="offcanvas-title">Types de corrections</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                        <button id='vloin' type="button"
                            class="d-flex justify-content-between p-4 btn btn-primary mb-2 d-grid w-100 font-size-xl"
                            data-bs-toggle="modal" data-bs-target="#exLargeModal-vloin">

                            <div style="font-size: x-large"> Vision de Loin </div>
                            <i class='bx bx-low-vision'style="font-size:2.15rem"></i>
                        </button>
                        <button id='vproche' type="button"
                            class="d-flex justify-content-between p-4 btn btn-primary mb-2 d-grid w-100"
                            data-bs-toggle="modal" data-bs-target="#exLargeModal-vproche">
                            <div style="font-size: x-large">Vision de Pres</div>
                            <i class='bx bx-book-open'style="font-size: 2.15rem"></i>
                        </button>
                        <button id='lentille' type="button"
                            class="d-flex justify-content-between p-4 btn btn-primary mb-2 d-grid w-100"
                            data-bs-toggle="modal" data-bs-target="#exLargeModal-lentille">
                            <div style="font-size: x-large">Lentilles</div>
                            <i class='bx bx-circle'style="font-size: 2.15rem"></i>
                        </button>
                        <button id="close" type="button" class="btn btn-outline-secondary d-grid w-100"
                            data-bs-dismiss="offcanvas">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--Button End-->
        <!--Modal -->
        <div class="table-responsive text-nowrap">
            <div class="modal fade" id="exLargeModal-vloin" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel4">Vision De Loin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('correction_loin') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                @include('correction.loin')
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

        <div class="table-responsive text-nowrap">
            <div class="modal fade" id="exLargeModal-vproche" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel4">Vision de Pres</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('correction_pres') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                @include('correction.pres')
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

        <div class="table-responsive text-nowrap">
            <div class="modal fade" id="exLargeModal-lentille" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel4">Lentilles</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('correction_lentille') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                @include('correction.lentille')
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
        <!--Modal End -->
        <!-- Responsive Table -->
        <div class="card mt-2">
            <h5 class="card-header">Tableau des corrections</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Patient</th>
                            <th>Correction</th>
                            <th>Date</th>
                            <th>Sph_Od</th>
                            <th>Sph_Og</th>
                            <th>Cly_Od</th>
                            <th>Cly_Og</th>
                            <th>Axe_Od</th>
                            <th>Axe_Og</th>
                            <th>Option</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($corrections as $correction)
                            <tr>
                                <th scope="row">{{ $correction->id }}</th>
                                <td>{{ $correction->patient->nom }} {{ $correction->patient->prenom }}</td>
                                <td>
                                    @if ($correction->type_vision === 1)
                                        {{ 'Vision de loin' }}
                                    @elseif($correction->type_vision === 2)
                                        {{ 'Vision de pres' }}@else{{ 'Lentilles' }}
                                    @endif
                                </td>
                                <td>{{ $correction->date }}</td>
                                <td>{{ $correction->sph_od }}</td>
                                <td>{{ $correction->sph_og }}</td>
                                <td>{{ $correction->cly_od }}</td>
                                <td>{{ $correction->cly_og }}</td>
                                <td>{{ $correction->axe_od }}</td>
                                <td>{{ $correction->axe_og }}</td>
                                <td>{{ $correction->option ?? 'Sans' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="{{ route('correction.show', $correction->id) }}"><i
                                                    class="bx bx-show me-1"></i> Show</a>
                                            <a class="dropdown-item" href="{{ route('correction.edit', $correction->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="{{ route('correction.destroy', $correction->id) }}"><i
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
        let offcanvas = document.querySelector('.offcanvas');
        let vproche = document.querySelector('#vproche');
        let vloin = document.querySelector('#vloin');
        let lentille = document.querySelector('#lentille');
        let closeBtn = document.querySelector('#close');
        vproche.addEventListener('click', function() {

            closeBtn.click();
        });
        vloin.addEventListener('click', function() {
            closeBtn.click();
        });
        lentille.addEventListener('click', function() {
            closeBtn.click();
        });

        const currentLocation = location.pathname.split('/')[1];
        console.log(currentLocation);
        const menuItem = document.querySelectorAll('.menu-item');

        document.querySelector('.menu-item').classList.remove('active')

        const menuLength = menuItem.length;

        for (let i = 0; i < menuLength; i++) {
            console.log(menuItem[5].innerText.replace(/\s/g, ""));
            if (menuItem[i].innerText.toLowerCase().replace(/\s/g, "") === currentLocation) {
                console.log('ta mere');
                document.querySelector('#open').classList.add('open', 'active');
                menuItem[i].classList.add('active');
            }
        }
    </script>
@endsection
