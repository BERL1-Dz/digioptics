@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des Recettes</h3>
                    <div class="card-tools">
                        <a href="{{ route('recette.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nouvelle Recette
                        </a>
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
                                    <div class="d-flex gap-2">
                                        <a href="recette/{{ $recette->id }}" class="btn btn-sm btn-info" title="Voir">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="recetteEdit/{{ $recette->id }}" class="btn btn-sm btn-primary" title="Modifier">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <form action="recette/delete/{{ $recette->id }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?')">
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