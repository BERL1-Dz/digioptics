@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>Categorie </h1>
        <!--Button-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
            Nouvelle Categorie
        </button>
        <!--Button End-->
        <!--Modal -->
        <div class="table-responsive text-nowrap">
            <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel4">Categorie</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('create_categorie') }}" method="post" enctype="multipart/form-data">
                          {{csrf_field()}}
                        <div class="modal-body">
                          @include('categorie.form')
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
                    <th>Nomination</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $categorie)
                        <tr>
                            <th scope="row">{{ $categorie->id }}</th>
                            <th scope="row">{{ $categorie->nomination }}</th>

                            <td>
                                <div class="d-flex gap-2">
                                    <a href="categorie/{{ $categorie->id }}" class="btn btn-sm btn-info" title="Voir">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="categorieEdit/{{ $categorie->id }}" class="btn btn-sm btn-primary" title="Modifier">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="categorie/delete/{{ $categorie->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
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
