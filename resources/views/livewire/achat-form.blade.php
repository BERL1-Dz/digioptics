<div class="row">
    <div class="col mb-0">
        <label for="fournisseur_id" class="form-label">Fournisseur:</label>
        <select wire:model="fournisseur_id" class="form-control" required>
            <option value="">Sélectionner un fournisseur</option>
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row g-3">
    <div class="col mb-0">
        <label for="date" class="form-label">Date</label>
        <input type="date" wire:model="date" class="form-control" required />
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <!-- Verres Section -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Verres</h6>
                <button type="button" wire:click="addVerreRow" class="btn btn-primary btn-sm">
                    <i class='bx bx-plus me-1'></i> Ajouter un verre
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Verre</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($verreRows as $index => $row)
                            <tr>
                                <td>
                                    <select wire:model="verreRows.{{ $index }}.id" class="form-select" required>
                                        <option value="">Sélectionner un verre</option>
                                        @foreach($verres as $verre)
                                            <option value="{{ $verre->id }}" data-price="{{ $verre->prix_achat }}">
                                                {{ $verre->sph }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" wire:model="verreRows.{{ $index }}.quantite" class="form-control" min="1" required>
                                </td>
                                <td>
                                    <input type="number" wire:model="verreRows.{{ $index }}.prix_unitaire" class="form-control" step="0.01" min="0" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{ number_format($row['total'], 2) }}" readonly>
                                </td>
                                <td>
                                    <button type="button" wire:click="removeVerreRow({{ $index }})" class="btn btn-danger btn-sm">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Lentilles Section -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Lentilles</h6>
                <button type="button" wire:click="addLentilleRow" class="btn btn-primary btn-sm">
                    <i class='bx bx-plus me-1'></i> Ajouter une lentille
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Lentille</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lentilleRows as $index => $row)
                            <tr>
                                <td>
                                    <select wire:model="lentilleRows.{{ $index }}.id" class="form-select" required>
                                        <option value="">Sélectionner une lentille</option>
                                        @foreach($lentilles as $lentille)
                                            <option value="{{ $lentille->id }}" data-price="{{ $lentille->prix_achat }}">
                                                {{ $lentille->libellé }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" wire:model="lentilleRows.{{ $index }}.quantite" class="form-control" min="1" required>
                                </td>
                                <td>
                                    <input type="number" wire:model="lentilleRows.{{ $index }}.prix_unitaire" class="form-control" step="0.01" min="0" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{ number_format($row['total'], 2) }}" readonly>
                                </td>
                                <td>
                                    <button type="button" wire:click="removeLentilleRow({{ $index }})" class="btn btn-danger btn-sm">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Montures Section -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">Montures</h6>
                <button type="button" wire:click="addMontureRow" class="btn btn-primary btn-sm">
                    <i class='bx bx-plus me-1'></i> Ajouter une monture
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Monture</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($montureRows as $index => $row)
                            <tr>
                                <td>
                                    <select wire:model="montureRows.{{ $index }}.id" class="form-select" required>
                                        <option value="">Sélectionner une monture</option>
                                        @foreach($montures as $monture)
                                            <option value="{{ $monture->id }}" data-price="{{ $monture->prix_achat }}">
                                                {{ $monture->model_monture }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" wire:model="montureRows.{{ $index }}.quantite" class="form-control" min="1" required>
                                </td>
                                <td>
                                    <input type="number" wire:model="montureRows.{{ $index }}.prix_unitaire" class="form-control" step="0.01" min="0" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{ number_format($row['total'], 2) }}" readonly>
                                </td>
                                <td>
                                    <button type="button" wire:click="removeMontureRow({{ $index }})" class="btn btn-danger btn-sm">
                                        <i class='bx bx-trash'></i>
                                    </button>
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

<div class="row mt-3">
    <div class="col-md-6 offset-md-6">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Total Général</th>
                    <td><input type="text" class="form-control" value="{{ number_format($grandTotal, 2) }}" readonly /></td>
                </tr>
            </table>
        </div>
    </div>
</div> 