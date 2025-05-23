@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>Accessoire</h1>
        <!--Button-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
            Ajoute un Accessoire
        </button>
        <!--Button End-->
        <!--Modal -->
        <div class="table-responsive text-nowrap">
            <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel4">Accessoire</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('create_accessoire') }}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                        <div class="modal-body">
                          @include('accessoire.form')
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
        <div class="card">
            <h5 class="card-header">Tabeau des devis</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead>
                  <tr class="text-nowrap">
                    <th>#</th>
                    <th>Categorie</th>
                    <th>Model</th>
                    <th>Marque</th>
                    <th>Genre</th>
                    <th>Prix</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($accessoires as $accessoire)
                  <tr>
                    <th scope="row">{{$accessoire->id}}</th>
                    <td>{{ $accessoire->categorie->nomination ?? 'none' }}</td>
                    <td>{{$accessoire->model}}</td>
                    <td>{{$accessoire->marque}}</td>
                    <td>{{$accessoire->genre}}</td>
                    <td>{{$accessoire->prix}}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href=""><i class="bx bx-show me-1"></i> Show</a>
                                <a class="dropdown-item" href="accessoireEdit/{{ $accessoire['id'] }}"><i
                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="accessoire/delete/{{ $accessoire['id'] }}"><i
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
        <!--/ Table within card -->

    </div>
    <script>
        const currentLocation = location.pathname.split('/')[1];
        console.log(currentLocation);
        const menuItem = document.querySelectorAll('.menu-item');

        document.querySelector('.menu-item').classList.remove('active')

        const menuLength = menuItem.length;

        for (let i = 0; i < menuLength; i++) {
            console.log(menuItem[2].innerText.replace(/\s/g, ""));
            if (menuItem[i].innerText.toLowerCase().replace(/\s/g, "") === currentLocation) {
                console.log('ta mere');
                document.querySelector('#open').classList.add('open', 'active');
                menuItem[i].classList.add('active');
            }
        }
    </script>
@endsection
