<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>Devis</h1>
        <!--Button-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exLargeModal">
            Ajouter Patient
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
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameExLarge" class="form-label">Name</label>
                                    <input type="text" id="nameExLarge" class="form-control"
                                        placeholder="Enter Name" />
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailExLarge" class="form-label">Email</label>
                                    <input type="text" id="emailExLarge" class="form-control"
                                        placeholder="xxxx@xxx.xx" />
                                </div>
                                <div class="col mb-0">
                                    <label for="dobExLarge" class="form-label">DOB</label>
                                    <input type="text" id="dobExLarge" class="form-control"
                                        placeholder="DD / MM / YY" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal End -->

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
</x-app-layout>
