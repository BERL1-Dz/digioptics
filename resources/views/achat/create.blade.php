@extends('layouts.app')

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let verreRowCount = 1;
        let lentilleRowCount = 1;
        let montureRowCount = 1;

        // Add event listeners to the "Add" buttons
        document.querySelectorAll('[data-add-row]').forEach(button => {
            button.addEventListener('click', function() {
                const type = this.dataset.addRow;
                switch(type) {
                    case 'verre':
                        addVerreRow();
                        break;
                    case 'lentille':
                        addLentilleRow();
                        break;
                    case 'monture':
                        addMontureRow();
                        break;
                }
            });
        });

        function addVerreRow() {
            const tbody = document.querySelector('#verresTable tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <select name="verres[${verreRowCount}][id]" class="form-select verre-select" required>
                        <option value="">Sélectionner un verre</option>
                        @foreach($verres as $verre)
                            <option value="{{ $verre->id }}" data-price="{{ $verre->prix_achat }}">
                                {{ $verre->index_verre }}
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
                    <button type="button" class="btn btn-danger btn-sm remove-row">
                        <i class='bx bx-trash'></i>
                    </button>
                </td>
            `;
            tbody.appendChild(newRow);
            verreRowCount++;
            initializeRowEvents(newRow);
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
                                {{ $lentille->libellé }}
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
                    <button type="button" class="btn btn-danger btn-sm remove-row">
                        <i class='bx bx-trash'></i>
                    </button>
                </td>
            `;
            tbody.appendChild(newRow);
            lentilleRowCount++;
            initializeRowEvents(newRow);
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
                                {{ $monture->model_monture }}
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
                    <button type="button" class="btn btn-danger btn-sm remove-row">
                        <i class='bx bx-trash'></i>
                    </button>
                </td>
            `;
            tbody.appendChild(newRow);
            montureRowCount++;
            initializeRowEvents(newRow);
        }

        function removeRow(button) {
            const row = button.closest('tr');
            const tbody = row.closest('tbody');
            // Don't remove if it's the last row
            if (tbody.children.length > 1) {
                row.remove();
            }
        }

        function safeParseFloat(value) {
            const parsed = parseFloat(value);
            return isNaN(parsed) ? 0 : parsed;
        }

        function calculateRowTotal(row) {
            console.log('Calculating row total'); // Debug log
            const quantity = safeParseFloat(row.querySelector('.quantity').value);
            const price = safeParseFloat(row.querySelector('.price').value);
            const total = quantity * price;
            
            const totalInput = row.querySelector('.total');
            if (totalInput) {
                totalInput.value = total.toFixed(2);
                console.log('Total calculated:', total.toFixed(2)); // Debug log
            }
            
            calculateTotals();
        }

        function calculateTotals() {
            console.log('Calculating totals'); // Debug log
            let grandTotal = 0;
            const totals = document.querySelectorAll('.total');
            totals.forEach(total => {
                grandTotal += safeParseFloat(total.value);
            });

            const grandTotalInput = document.getElementById('grand_total');
            if (grandTotalInput) {
                grandTotalInput.value = grandTotal.toFixed(2);
                console.log('Grand total calculated:', grandTotal.toFixed(2)); // Debug log
            }
        }

        function initializeRowEvents(row) {
            // Add input event listeners for quantity and price
            const quantityInput = row.querySelector('.quantity');
            const priceInput = row.querySelector('.price');
            const selectInput = row.querySelector('select');
            const removeButton = row.querySelector('.remove-row');

            // Calculate total when quantity or price changes
            quantityInput.addEventListener('input', () => {
                calculateRowTotal(row);
            });
            
            priceInput.addEventListener('input', () => {
                calculateRowTotal(row);
            });
            
            removeButton.addEventListener('click', () => {
                removeRow(removeButton);
                calculateTotals();
            });
            
            // Add change event listener for select
            selectInput.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const priceInput = row.querySelector('.price');
                priceInput.value = selectedOption.dataset.price || '';
                calculateRowTotal(row);
            });

            // Calculate initial total
            calculateRowTotal(row);
        }

        // Initialize events for existing rows
        document.querySelectorAll('table tbody tr').forEach(row => {
            initializeRowEvents(row);
        });
    });
</script>
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Nouvel Achat</h5>
                    <a href="{{ route('achat.index') }}" class="btn btn-secondary">
                        <i class='bx bx-arrow-back me-1'></i> Retour
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('achat.store') }}" method="POST">
                        @csrf
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">Informations Générales</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Fournisseur</label>
                                            <select name="fournisseur_id" class="form-select" required>
                                                <option value="">Sélectionner un fournisseur</option>
                                                @foreach($fournisseurs as $fournisseur)
                                                    <option value="{{ $fournisseur->id }}" {{ old('fournisseur_id') == $fournisseur->id ? 'selected' : '' }}>
                                                        {{ $fournisseur->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Notes</label>
                                            <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Verres Section -->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">Verres</h6>
                                <button type="button" class="btn btn-primary btn-sm" data-add-row="verre">
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
                                            <tr>
                                                <td>
                                                    <select name="verres[0][id]" class="form-select verre-select" required>
                                                        <option value="">Sélectionner un verre</option>
                                                        @foreach($verres as $verre)
                                                            <option value="{{ $verre->id }}" data-price="{{ $verre->prix_achat }}">
                                                                {{ $verre->index_verre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="verres[0][quantite]" class="form-control quantity" min="1" required>
                                                </td>
                                                <td>
                                                    <input type="number" name="verres[0][prix_unitaire]" class="form-control price" step="0.01" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control total" readonly>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-row">
                                                        <i class='bx bx-trash'></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Lentilles Section -->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">Lentilles</h6>
                                <button type="button" class="btn btn-primary btn-sm" data-add-row="lentille">
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
                                            <tr>
                                                <td>
                                                    <select name="lentilles[0][id]" class="form-select lentille-select" required>
                                                        <option value="">Sélectionner une lentille</option>
                                                        @foreach($lentilles as $lentille)
                                                            <option value="{{ $lentille->id }}" data-price="{{ $lentille->prix_achat }}">
                                                                {{ $lentille->libellé }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="lentilles[0][quantite]" class="form-control quantity" min="1" required>
                                                </td>
                                                <td>
                                                    <input type="number" name="lentilles[0][prix_unitaire]" class="form-control price" step="0.01" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control total" readonly>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-row">
                                                        <i class='bx bx-trash'></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Montures Section -->
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="card-title mb-0">Montures</h6>
                                <button type="button" class="btn btn-primary btn-sm" data-add-row="monture">
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
                                            <tr>
                                                <td>
                                                    <select name="montures[0][id]" class="form-select monture-select" required>
                                                        <option value="">Sélectionner une monture</option>
                                                        @foreach($montures as $monture)
                                                            <option value="{{ $monture->id }}" data-price="{{ $monture->prix_achat }}">
                                                                {{ $monture->model_monture }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="montures[0][quantite]" class="form-control quantity" min="1" required>
                                                </td>
                                                <td>
                                                    <input type="number" name="montures[0][prix_unitaire]" class="form-control price" step="0.01" min="0" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control total" readonly>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm remove-row">
                                                        <i class='bx bx-trash'></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class='bx bx-save me-1'></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 