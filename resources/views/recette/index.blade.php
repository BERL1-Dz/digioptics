@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des Recettes</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createRecetteModal">
                            <i class="fas fa-plus"></i> Nouvelle Recette
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="recettesTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Téléphone</th>
                                <th>Monture</th>
                                <th>Type Verre</th>
                                <th>Total</th>
                                <th>Payé</th>
                                <th>Reste</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recettes as $recette)
                            <tr>
                                <td>{{ str_pad($recette->id, 6, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $recette->client_nom }} {{ $recette->client_prenom }}</td>
                                <td>{{ $recette->client_telephone }}</td>
                                <td>{{ $recette->monture->model_monture }}</td>
                                <td>{{ $recette->type_verre }}</td>
                                <td>{{ number_format($recette->total, 2, ',', ' ') }} DA</td>
                                <td>{{ number_format($recette->montant_paye, 2, ',', ' ') }} DA</td>
                                <td>{{ number_format($recette->reste_a_payer, 2, ',', ' ') }} DA</td>
                                <td>
                                    <a href="{{ route('recette.show', $recette) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('recette.edit', $recette) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('recette.pdf', $recette) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                    <form action="{{ route('recette.destroy', $recette) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
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

<!-- Create Recette Modal -->
<div class="modal fade" id="createRecetteModal" tabindex="-1" aria-labelledby="createRecetteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRecetteModalLabel">Nouveau Bon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('recette.form')
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

        // Initialize Bootstrap modal
        var createRecetteModal = new bootstrap.Modal(document.getElementById('createRecetteModal'));
    });
</script>
@endpush 