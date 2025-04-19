@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Liste des Achats</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAchatModal">
                        <i class='bx bx-plus me-1'></i> Nouvel Achat
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Fournisseur</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($achats as $achat)
                                    <tr>
                                        <td>{{ $achat->date }}</td>
                                        <td>{{ $achat->fournisseur->nom }}</td>
                                        <td>{{ number_format($achat->total, 2) }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('achat.show', $achat) }}" class="btn btn-sm btn-info" title="Voir">
                                                    <i class="bx bx-show"></i>
                                                </a>
                                                <a href="{{ route('achat.edit', $achat) }}" class="btn btn-sm btn-primary" title="Modifier">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <form action="{{ route('achat.destroy', $achat) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet achat ?')">
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
        </div>
    </div>
</div>

<!-- Create Achat Modal -->
<div class="modal fade" id="createAchatModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouvel Achat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('achat.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @include('achat.form', [
                        'fournisseurs' => $fournisseurs,
                        'verres' => $verres,
                        'lentilles' => $lentilles,
                        'montures' => $montures
                    ])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Fermer
                    </button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 