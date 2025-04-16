<div class="row">
    <div class="col mb-0">
        <label for="fournisseur_id" class="form-label">Fournisseur:</label>
        <select name="fournisseur_id" class="form-control" required>
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row g-3">
    <div class="col mb-0">
        <label for="date" class="form-label">Date</label>
        <input type="date" id="date" class="form-control" name="date" required />
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
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
                                                {{ $verre->sph  }}
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
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6 offset-md-6">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Total Général</th>
                    <td><input type="number" name="grand_total" class="form-control" id="grand_total" readonly /></td>
                </tr>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let verreRowCount = 1;
        let lentilleRowCount = 1;
        let montureRowCount = 1;

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
                row.remove();
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

        function addNewRow(type) {
            const tableId = `${type}sTable`;
            const tbody = document.querySelector(`#${tableId} tbody`);
            const rowCount = type === 'verre' ? verreRowCount : (type === 'lentille' ? lentilleRowCount : montureRowCount);
            
            const newRow = document.createElement('tr');
            let optionsHtml = '<option value="">Sélectionner un ' + type + '</option>';
            
            // Add options based on type
            if (type === 'verre') {
                @foreach($verres as $verre)
                    optionsHtml += `<option value="{{ $verre->id }}" data-price="{{ $verre->prix_achat }}">{{ $verre->sph }}</option>`;
                @endforeach
            } else if (type === 'lentille') {
                @foreach($lentilles as $lentille)
                    optionsHtml += `<option value="{{ $lentille->id }}" data-price="{{ $lentille->prix_achat }}">{{ $lentille->libellé }}</option>`;
                @endforeach
            } else if (type === 'monture') {
                @foreach($montures as $monture)
                    optionsHtml += `<option value="{{ $monture->id }}" data-price="{{ $monture->prix_achat }}">{{ $monture->model_monture }}</option>`;
                @endforeach
            }
            
            newRow.innerHTML = `
                <td>
                    <select name="${type}s[${rowCount}][id]" class="form-select ${type}-select" required>
                        ${optionsHtml}
                    </select>
                </td>
                <td>
                    <input type="number" name="${type}s[${rowCount}][quantite]" class="form-control quantity" min="1" required>
                </td>
                <td>
                    <input type="number" name="${type}s[${rowCount}][prix_unitaire]" class="form-control price" step="0.01" min="0" required>
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
            initializeRowEvents(newRow);
            
            if (type === 'verre') verreRowCount++;
            else if (type === 'lentille') lentilleRowCount++;
            else montureRowCount++;
        }

        // Add event listeners to the "Add" buttons
        document.querySelectorAll('[data-add-row]').forEach(button => {
            button.addEventListener('click', function() {
                const type = this.dataset.addRow;
                addNewRow(type);
            });
        });

        // Initialize events for existing rows
        document.querySelectorAll('table tbody tr').forEach(row => {
            initializeRowEvents(row);
        });

        // Initialize calculations for existing rows
        document.querySelectorAll('table tbody tr').forEach(row => {
            calculateRowTotal(row);
        });
    });
</script>
@endpush 