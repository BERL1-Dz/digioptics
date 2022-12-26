@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3"><span class="text-muted fw-light">Dossier /</span> Patient</h4>
        <!--Button-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
            Nouveau Patient
        </button>
        <!--Button End-->
        <!--Modal -->
        <div class="table-responsive text-nowrap">
            <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('create_patient') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                @include('patient.form')
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
        <div class="card mt-2">
            <h5 class="card-header">Tabeau des patients</h5>
            <div class="table-responsive text-nowrap">
                <table class="table card-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Age</th>
                            <th>Telephon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($patients as $patient)
                            <tr>
                                <th scope="row">{{ $patient->id }}</th>
                                <td>{{ $patient->nom }}</td>
                                <td>{{ $patient->prenom }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->phone }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href=""><i class="bx bx-show me-1"></i> Show</a>
                                            <a class="dropdown-item" href="patientEdit/{{ $patient['id'] }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="patient/delete/{{ $patient['id'] }}"><i
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
