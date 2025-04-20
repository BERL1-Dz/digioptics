<div>
    <div class="row">
        <div class="col-md-4">
            <div class="info-box">
                <h4 class="info-box-title">Total des Recettes</h4>
                <div class="info-box-content">
                    <h3>{{ number_format($totalRecettes, 0, ',', ' ') }} DA</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <h4 class="info-box-title">Total Payé</h4>
                <div class="info-box-content">
                    <h3>{{ number_format($totalPaye, 0, ',', ' ') }} DA</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <h4 class="info-box-title">Reste à Payer</h4>
                <div class="info-box-content">
                    <h3>{{ number_format($totalReste, 0, ',', ' ') }} DA</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="info-box">
                <h4 class="info-box-title">Historique du client</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Type de Verre</th>
                                <th>Monture</th>
                                <th>Total</th>
                                <th>Montant Payé</th>
                                <th>Reste à Payer</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($patient->recettes as $recette)
                                <tr>
                                    <td>{{ $recette->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $recette->type_verre }}</td>
                                    <td>{{ $recette->monture->model_monture }}</td>
                                    <td>{{ number_format($recette->total, 0, ',', ' ') }} DA</td>
                                    <td>{{ number_format($recette->montant_paye, 0, ',', ' ') }} DA</td>
                                    <td>{{ number_format($recette->reste_a_payer, 0, ',', ' ') }} DA</td>
                                    <td>
                                        @if($recette->reste_a_payer == 0)
                                            <span class="badge bg-success">Payé</span>
                                        @else
                                            <span class="badge bg-warning">En attente</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('recette.show', $recette) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('recette.pdf', $recette) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        Aucune recette trouvée pour le patient #{{ $patient->id }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
