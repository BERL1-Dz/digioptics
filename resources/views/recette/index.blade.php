@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Recettes</h5>
                            <p class="mb-4">
                                Gérer les recettes des patients
                            </p>
                            <a href="{{ route('recette.create') }}" class="btn btn-sm btn-outline-primary">Nouvelle Recette</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Liste des Recettes</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Date</th>
                                    <th>Telephone</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recettes as $recette)
                                    <tr>
                                        <td>{{ $recette->id }}</td>
                                        <td>{{ $recette->patient->nom ?? 'N/A' }}</td>
                                        <td>{{ $recette->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $recette->client_telephone ?? 'N/A' }}</td>
                                        <td>
                                            @if($recette->status === 0)
                                                <span class="badge bg-label-warning">En cours</span>
                                            @else
                                                <span class="badge bg-label-success">Prêt</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($recette->total, 2) }} DA</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('recette.show', $recette) }}" class="btn btn-sm btn-info" title="Voir">
                                                    <i class="bx bx-show"></i>
                                                </a>
                                                <a href="{{ route('recette.edit', $recette) }}" class="btn btn-sm btn-primary" title="Modifier">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <form action="{{ route('recette.destroy', $recette) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce patient ?')">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            {{-- <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('recette.show', $recette) }}">
                                                        <i class="bx bx-show me-1"></i> Voir
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('recette.edit', $recette) }}">
                                                        <i class="bx bx-edit-alt me-1"></i> Modifier
                                                    </a>
                                                    
                                                    <a class="dropdown-item" href="{{ route('recette.pdf', $recette) }}">
                                                        <i class="bx bx-download me-1"></i> PDF
                                                    </a>
                                                    <form action="{{ route('recette.destroy', $recette) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?')">
                                                            <i class="bx bx-trash me-1"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </div> --}}
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
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#recettesTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
            }
        });
    });
</script>
@endpush 