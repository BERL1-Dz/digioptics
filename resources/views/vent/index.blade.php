@extends('layouts.app')

@section('title', 'Liste des Ventes')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Liste des Ventes</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ventModal">
                        <i class='bx bx-plus me-1'></i> Nouvelle Vente
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="ventsTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Fournisseur</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vents as $vent)
                                <tr>
                                    <td>{{ $vent->date->format('d/m/Y') }}</td>
                                    <td>{{ $vent->fournisseur->nom }}</td>
                                    <td>{{ number_format($vent->total, 2, ',', ' ') }} DA</td>
                                    <td>
                                        <a href="{{ route('vent.show', $vent) }}" class="btn btn-info btn-sm">
                                            <i class='bx bx-show me-1'></i> Voir
                                        </a>
                                        <a href="{{ route('vent.edit', $vent) }}" class="btn btn-primary btn-sm">
                                            <i class='bx bx-edit me-1'></i> Modifier
                                        </a>
                                        <form action="{{ route('vent.destroy', $vent) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette vente ?')">
                                                <i class='bx bx-trash me-1'></i> Supprimer
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
</div>

<!-- Modal -->
<div class="modal fade" id="ventModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouvelle Vente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:vent-form />
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#ventsTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/fr-FR.json'
            },
            order: [[0, 'desc']]
        });
    });
</script>
@endpush 