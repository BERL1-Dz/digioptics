<div>
    <form action="{{ route('vent.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col mb-0">
                <label for="fournisseur_id" class="form-label">Fournisseur:</label>
                <select wire:model="fournisseur_id" name="fournisseur_id" class="form-control" required>
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
                <input type="date" wire:model="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required />
            </div>
        </div>

        <div class="row g-3 mt-3">
            <div class="col mb-0">
                <label for="notes" class="form-label">Notes</label>
                <textarea wire:model="notes" name="notes" class="form-control" rows="3" placeholder="Ajouter des notes (optionnel)"></textarea>
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
                                            <select wire:model="verreRows.{{ $index }}.id" name="verres[{{ $index }}][id]" class="form-select" required>
                                                <option value="">Sélectionner un verre</option>
                                                @foreach($verres as $verre)
                                                    <option value="{{ $verre->id }}" data-price="{{ $verre->prix_vente }}">
                                                        {{ $verre->index_verre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" wire:model="verreRows.{{ $index }}.quantite" 
                                                   name="verres[{{ $index }}][quantite]" 
                                                   class="form-control" min="1" required>
                                        </td>
                                        <td>
                                            <input type="number" wire:model="verreRows.{{ $index }}.prix_unitaire" 
                                                   name="verres[{{ $index }}][prix_unitaire]" 
                                                   class="form-control" step="0.01" min="0" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ number_format($row['total'], 2, ',', ' ') }}" readonly>
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
                                            <select wire:model="lentilleRows.{{ $index }}.id" name="lentilles[{{ $index }}][id]" class="form-select" required>
                                                <option value="">Sélectionner une lentille</option>
                                                @foreach($lentilles as $lentille)
                                                    <option value="{{ $lentille->id }}" data-price="{{ $lentille->prix_vente }}">
                                                        {{ $lentille->libellé }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" wire:model="lentilleRows.{{ $index }}.quantite" 
                                                   name="lentilles[{{ $index }}][quantite]" 
                                                   class="form-control" min="1" required>
                                        </td>
                                        <td>
                                            <input type="number" wire:model="lentilleRows.{{ $index }}.prix_unitaire" 
                                                   name="lentilles[{{ $index }}][prix_unitaire]" 
                                                   class="form-control" step="0.01" min="0" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ number_format($row['total'], 2, ',', ' ') }}" readonly>
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
                                            <select wire:model="montureRows.{{ $index }}.id" name="montures[{{ $index }}][id]" class="form-select" required>
                                                <option value="">Sélectionner une monture</option>
                                                @foreach($montures as $monture)
                                                    <option value="{{ $monture->id }}" data-price="{{ $monture->prix_vente }}">
                                                        {{ $monture->model_monture }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" wire:model="montureRows.{{ $index }}.quantite" 
                                                   name="montures[{{ $index }}][quantite]" 
                                                   class="form-control" min="1" required>
                                        </td>
                                        <td>
                                            <input type="number" wire:model="montureRows.{{ $index }}.prix_unitaire" 
                                                   name="montures[{{ $index }}][prix_unitaire]" 
                                                   class="form-control" step="0.01" min="0" required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ number_format($row['total'], 2, ',', ' ') }}" readonly>
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
                            <td>
                                <input type="text" class="form-control" value="{{ number_format($grandTotal, 2, ',', ' ') }}" readonly />
                                <input type="hidden" name="total" value="{{ $grandTotal }}">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class='bx bx-save me-1'></i> Enregistrer
            </button>
            <a href="{{ route('vent.index') }}" class="btn btn-secondary">
                <i class='bx bx-x me-1'></i> Annuler
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let rowIndexCounters = { verres: 1, lentilles: 1, montures: 1 };

    // Function to format currency (French style)
    function formatCurrency(value) {
        return parseFloat(value).toLocaleString('fr-FR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Function to parse currency (French style)
    function parseCurrency(value) {
        if (typeof value === 'string') {
            return parseFloat(value.replace(/\s/g, '').replace(',', '.')) || 0;
        }
        return parseFloat(value) || 0;
    }

    // Function to calculate total for a row
    function calculateRowTotal(row) {
        const quantity = parseInt(row.querySelector('.quantity-input').value) || 0;
        const price = parseCurrency(row.querySelector('.price-input').value);
        const total = quantity * price;
        row.querySelector('.row-total').value = formatCurrency(total);
        return total;
    }

    // Function to calculate grand total
    function calculateGrandTotal() {
        let total = 0;
        document.querySelectorAll('#verres-rows tr, #lentilles-rows tr, #montures-rows tr').forEach(row => {
            total += calculateRowTotal(row);
        });
        
        document.getElementById('grand_total_display').value = formatCurrency(total);
        document.getElementById('grand_total_value').value = total.toFixed(2);
    }

    // Function to add a new row
    function addRow(type) {
        const tbody = document.getElementById(`${type}-rows`);
        const index = rowIndexCounters[type]++;
        const template = tbody.querySelector('tr').cloneNode(true);
        
        // Update input names with new index
        template.querySelectorAll('[name]').forEach(input => {
            input.name = input.name.replace('[0]', `[${index}]`);
        });
        
        // Clear values
        template.querySelector('.product-select').value = '';
        template.querySelector('.quantity-input').value = '1';
        template.querySelector('.price-input').value = '0.00';
        template.querySelector('.row-total').value = '';
        
        tbody.appendChild(template);
        initializeRowEvents(template);
        calculateGrandTotal();
    }

    // Function to initialize row events
    function initializeRowEvents(row) {
        const quantityInput = row.querySelector('.quantity-input');
        const priceInput = row.querySelector('.price-input');
        const productSelect = row.querySelector('.product-select');
        const removeButton = row.querySelector('.remove-row');

        if (quantityInput) quantityInput.addEventListener('input', calculateGrandTotal);
        if (priceInput) {
            priceInput.addEventListener('input', calculateGrandTotal);
            priceInput.addEventListener('blur', function() {
                this.value = formatCurrency(parseCurrency(this.value));
                calculateGrandTotal();
            });
        }

        if (productSelect) {
            productSelect.addEventListener('change', function() {
                const price = this.options[this.selectedIndex].dataset.price;
                if (price && priceInput) {
                    priceInput.value = formatCurrency(price);
                    calculateGrandTotal();
                }
            });
        }

        if (removeButton) {
            removeButton.addEventListener('click', function() {
                if (row.parentElement.children.length > 1) {
                    row.remove();
                    calculateGrandTotal();
                }
            });
        }
    }

    // Add event listeners to add row buttons
    document.querySelectorAll('.add-row').forEach(button => {
        button.addEventListener('click', function() {
            addRow(this.dataset.type);
        });
    });

    // Initialize existing rows
    document.querySelectorAll('#verres-rows tr, #lentilles-rows tr, #montures-rows tr').forEach(row => {
        initializeRowEvents(row);
    });

    // Initial calculation
    calculateGrandTotal();
});
</script>
@endpush 