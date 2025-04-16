@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Modifier l'Achat</h5>
                    <a href="{{ route('achat.index') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back me-1'></i> Retour
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('achat.update', $achat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Informations Générales</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control" value="{{ old('date', $achat->date->format('Y-m-d')) }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fournisseur</label>
                                            <select name="fournisseur_id" class="form-select" required>
                                                <option value="">Sélectionner un fournisseur</option>
                                                @foreach($fournisseurs as $fournisseur)
                                                    <option value="{{ $fournisseur->id }}" {{ old('fournisseur_id', $achat->fournisseur_id) == $fournisseur->id ? 'selected' : '' }}>
                                                        {{ $fournisseur->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Notes</label>
                                            <textarea name="notes" class="form-control" rows="3">{{ old('notes', $achat->notes) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Verres Section -->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">Verres</h6>
                                <button type="button" class="btn btn-primary btn-sm" onclick="addVerreRow()">
                                    <i class='bx bx-plus me-1'></i> Ajouter un verre
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="verresTable">
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
                                            @foreach($achat->verres as $index => $verre)
                                            <tr>
                                                <td>
                                                    <select name="verres[{{ $index }}][id]" class="form-select verre-select" required>
                                                        <option value="">Sélectionner un verre</option>
                                                        @foreach($verres as $v)
                                                            <option value="{{ $v->id }}" data-price="{{ $v->prix_achat }}"
                                                                {{ old("verres.$index.id", $verre->id) == $v->id ? 'selected' : '' }}>
                                                                {{ $v->nom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="verres[{{ $index }}][quantite]" class="form-control quantity" 
                                                        value="{{ old("verres.$index.quantite", $verre->pivot->quantite) }}" min="1" required>
                                                </td>
                                                <td>
                                                    <input type="number" name="verres[{{ $index }}][prix_unitaire]" class="form-control price" 
                                                        value="{{ old("verres.$index.prix_unitaire", $verre->pivot->prix_unitaire) }}" step="0.01" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control total" readonly 
                                                        value="{{ number_format($verre->pivot->total, 2) }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
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
                                <button type="button" class="btn btn-primary btn-sm" onclick="addLentilleRow()">
                                    <i class='bx bx-plus me-1'></i> Ajouter une lentille
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="lentillesTable">
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
                                            @foreach($achat->lentilles as $index => $lentille)
                                            <tr>
                                                <td>
                                                    <select name="lentilles[{{ $index }}][id]" class="form-select lentille-select" required>
                                                        <option value="">Sélectionner une lentille</option>
                                                        @foreach($lentilles as $l)
                                                            <option value="{{ $l->id }}" data-price="{{ $l->prix_achat }}"
                                                                {{ old("lentilles.$index.id", $lentille->id) == $l->id ? 'selected' : '' }}>
                                                                {{ $l->nom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="lentilles[{{ $index }}][quantite]" class="form-control quantity" 
                                                        value="{{ old("lentilles.$index.quantite", $lentille->pivot->quantite) }}" min="1" required>
                                                </td>
                                                <td>
                                                    <input type="number" name="lentilles[{{ $index }}][prix_unitaire]" class="form-control price" 
                                                        value="{{ old("lentilles.$index.prix_unitaire", $lentille->pivot->prix_unitaire) }}" step="0.01" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control total" readonly 
                                                        value="{{ number_format($lentille->pivot->total, 2) }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
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
                                <button type="button" class="btn btn-primary btn-sm" onclick="addMontureRow()">
                                    <i class='bx bx-plus me-1'></i> Ajouter une monture
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="monturesTable">
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
                                            @foreach($achat->montures as $index => $monture)
                                            <tr>
                                                <td>
                                                    <select name="montures[{{ $index }}][id]" class="form-select monture-select" required>
                                                        <option value="">Sélectionner une monture</option>
                                                        @foreach($montures as $m)
                                                            <option value="{{ $m->id }}" data-price="{{ $m->prix_achat }}"
                                                                {{ old("montures.$index.id", $monture->id) == $m->id ? 'selected' : '' }}>
                                                                {{ $m->nom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="montures[{{ $index }}][quantite]" class="form-control quantity" 
                                                        value="{{ old("montures.$index.quantite", $monture->pivot->quantite) }}" min="1" required>
                                                </td>
                                                <td>
                                                    <input type="number" name="montures[{{ $index }}][prix_unitaire]" class="form-control price" 
                                                        value="{{ old("montures.$index.prix_unitaire", $monture->pivot->prix_unitaire) }}" step="0.01" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control total" readonly 
                                                        value="{{ number_format($monture->pivot->total, 2) }}">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
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

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class='bx bx-save me-1'></i> Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let verreRowCount = {{ count($achat->verres) }};
    let lentilleRowCount = {{ count($achat->lentilles) }};
    let montureRowCount = {{ count($achat->montures) }};

    function addVerreRow() {
        const tbody = document.querySelector('#verresTable tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select name="verres[${verreRowCount}][id]" class="form-select verre-select" required>
                    <option value="">Sélectionner un verre</option>
                    @foreach($verres as $verre)
                        <option value="{{ $verre->id }}" data-price="{{ $verre->prix_achat }}">
                            {{ $verre->nom }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="verres[${verreRowCount}][quantite]" class="form-control quantity" min="1" required>
            </td>
            <td>
                <input type="number" name="verres[${verreRowCount}][prix_unitaire]" class="form-control price" step="0.01" min="0" required>
            </td>
            <td>
                <input type="text" class="form-control total" readonly>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                    <i class='bx bx-trash'></i>
                </button>
            </td>
        `;
        tbody.appendChild(newRow);
        verreRowCount++;
    }

    function addLentilleRow() {
        const tbody = document.querySelector('#lentillesTable tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select name="lentilles[${lentilleRowCount}][id]" class="form-select lentille-select" required>
                    <option value="">Sélectionner une lentille</option>
                    @foreach($lentilles as $lentille)
                        <option value="{{ $lentille->id }}" data-price="{{ $lentille->prix_achat }}">
                            {{ $lentille->nom }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="lentilles[${lentilleRowCount}][quantite]" class="form-control quantity" min="1" required>
            </td>
            <td>
                <input type="number" name="lentilles[${lentilleRowCount}][prix_unitaire]" class="form-control price" step="0.01" min="0" required>
            </td>
            <td>
                <input type="text" class="form-control total" readonly>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                    <i class='bx bx-trash'></i>
                </button>
            </td>
        `;
        tbody.appendChild(newRow);
        lentilleRowCount++;
    }

    function addMontureRow() {
        const tbody = document.querySelector('#monturesTable tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>
                <select name="montures[${montureRowCount}][id]" class="form-select monture-select" required>
                    <option value="">Sélectionner une monture</option>
                    @foreach($montures as $monture)
                        <option value="{{ $monture->id }}" data-price="{{ $monture->prix_achat }}">
                            {{ $monture->nom }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="montures[${montureRowCount}][quantite]" class="form-control quantity" min="1" required>
            </td>
            <td>
                <input type="number" name="montures[${montureRowCount}][prix_unitaire]" class="form-control price" step="0.01" min="0" required>
            </td>
            <td>
                <input type="text" class="form-control total" readonly>
            </td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">
                    <i class='bx bx-trash'></i>
                </button>
            </td>
        `;
        tbody.appendChild(newRow);
        montureRowCount++;
    }

    function removeRow(button) {
        const row = button.closest('tr');
        row.remove();
    }

    function calculateRowTotal(row) {
        const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
        const price = parseFloat(row.querySelector('.price').value) || 0;
        const total = quantity * price;
        row.querySelector('.total').value = total.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('table').forEach(table => {
            table.addEventListener('input', function(e) {
                if (e.target.classList.contains('quantity') || e.target.classList.contains('price')) {
                    calculateRowTotal(e.target.closest('tr'));
                }
            });

            table.addEventListener('change', function(e) {
                if (e.target.classList.contains('verre-select') || 
                    e.target.classList.contains('lentille-select') || 
                    e.target.classList.contains('monture-select')) {
                    const selectedOption = e.target.options[e.target.selectedIndex];
                    const priceInput = e.target.closest('tr').querySelector('.price');
                    priceInput.value = selectedOption.dataset.price || '';
                    calculateRowTotal(e.target.closest('tr'));
                }
            });
        });
    });
</script>
@endpush
@endsection 