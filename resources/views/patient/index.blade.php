@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dossier /</span> Patient</h4>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
        <div class="table-responsive text-nowrap">
            <table class="table card-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                </tbody>
            </table>
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
