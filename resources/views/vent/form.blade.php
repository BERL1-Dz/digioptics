@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">{{ isset($vent) ? 'Modifier la Vente' : 'Créer une Nouvelle Vente' }}</h5>
            <a href="{{ route('vent.index') }}" class="btn btn-primary">
                <i class='bx bx-arrow-back me-1'></i> Retour à la liste
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('vent.store') }}" method="POST" id="vent-form">
                @csrf
                @if(isset($vent))
                    @method('PUT')
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" id="date" name="date" class="form-control @error('date') is-invalid @enderror" 
                            value="{{ old('date', isset($vent) ? $vent->date->format('Y-m-d') : date('Y-m-d')) }}" required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fournisseur_id" class="form-label">Fournisseur <span class="text-danger">*</span></label>
                        <select id="fournisseur_id" name="fournisseur_id" class="form-select @error('fournisseur_id') is-invalid @enderror" required>
                            <option value="">Sélectionner un fournisseur</option>
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}" 
                                    {{ old('fournisseur_id', isset($vent) ? $vent->fournisseur_id : '') == $fournisseur->id ? 'selected' : '' }}>
                                    {{ $fournisseur->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('fournisseur_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror" rows="3">{{ old('notes', isset($vent) ? $vent->notes : '') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Verres Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title mb-0">Verres</h6>
                        <button type="button" class="btn btn-primary btn-sm add-row" data-type="verres">
                            <i class='bx bx-plus me-1'></i> Ajouter un verre
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="verres-table">
                                <thead>
                                    <tr>
                                        <th>Verre <span class="text-danger">*</span></th>
                                        <th>Quantité <span class="text-danger">*</span></th>
                                        <th>Prix Unitaire <span class="text-danger">*</span></th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="verres-rows">
                                    @if(isset($vent))
                                        @foreach($vent->verres as $index => $verre)
                                        <tr>
                                            <td>
                                                <select name="verres[{{ $index }}][id]" class="form-select product-select" required>
                                                    <option value="">Sélectionner un verre</option>
                                                    @foreach($verres as $v)
                                                        <option value="{{ $v->id }}" 
                                                            data-price="{{ $v->prix_vente }}"
                                                            {{ $verre->id == $v->id ? 'selected' : '' }}>
                                                            {{ $v->index_verre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="verres[{{ $index }}][quantite]" 
                                                    class="form-control quantity-input" min="1" 
                                                    value="{{ $verre->pivot->quantite }}" required>
                                            </td>
                                            <td>
                                                <input type="number" name="verres[{{ $index }}][prix_unitaire]" 
                                                    class="form-control price-input" step="0.01" min="0" 
                                                    value="{{ $verre->pivot->prix_unitaire }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control row-total" readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Lentilles Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title mb-0">Lentilles</h6>
                        <button type="button" class="btn btn-primary btn-sm add-row" data-type="lentilles">
                            <i class='bx bx-plus me-1'></i> Ajouter une lentille
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="lentilles-table">
                                <thead>
                                    <tr>
                                        <th>Lentille <span class="text-danger">*</span></th>
                                        <th>Quantité <span class="text-danger">*</span></th>
                                        <th>Prix Unitaire <span class="text-danger">*</span></th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="lentilles-rows">
                                    @if(isset($vent))
                                        @foreach($vent->lentilles as $index => $lentille)
                                        <tr>
                                            <td>
                                                <select name="lentilles[{{ $index }}][id]" class="form-select product-select" required>
                                                    <option value="">Sélectionner une lentille</option>
                                                    @foreach($lentilles as $l)
                                                        <option value="{{ $l->id }}" 
                                                            data-price="{{ $l->prix_vente }}"
                                                            {{ $lentille->id == $l->id ? 'selected' : '' }}>
                                                            {{ $l->libellé }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="lentilles[{{ $index }}][quantite]" 
                                                    class="form-control quantity-input" min="1" 
                                                    value="{{ $lentille->pivot->quantite }}" required>
                                            </td>
                                            <td>
                                                <input type="number" name="lentilles[{{ $index }}][prix_unitaire]" 
                                                    class="form-control price-input" step="0.01" min="0" 
                                                    value="{{ $lentille->pivot->prix_unitaire }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control row-total" readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Montures Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title mb-0">Montures</h6>
                        <button type="button" class="btn btn-primary btn-sm add-row" data-type="montures">
                            <i class='bx bx-plus me-1'></i> Ajouter une monture
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="montures-table">
                                <thead>
                                    <tr>
                                        <th>Monture <span class="text-danger">*</span></th>
                                        <th>Quantité <span class="text-danger">*</span></th>
                                        <th>Prix Unitaire <span class="text-danger">*</span></th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="montures-rows">
                                    @if(isset($vent))
                                        @foreach($vent->montures as $index => $monture)
                                        <tr>
                                            <td>
                                                <select name="montures[{{ $index }}][id]" class="form-select product-select" required>
                                                    <option value="">Sélectionner une monture</option>
                                                    @foreach($montures as $m)
                                                        <option value="{{ $m->id }}" 
                                                            data-price="{{ $m->prix_vente }}"
                                                            {{ $monture->id == $m->id ? 'selected' : '' }}>
                                                            {{ $m->model_monture }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="montures[{{ $index }}][quantite]" 
                                                    class="form-control quantity-input" min="1" 
                                                    value="{{ $monture->pivot->quantite }}" required>
                                            </td>
                                            <td>
                                                <input type="number" name="montures[{{ $index }}][prix_unitaire]" 
                                                    class="form-control price-input" step="0.01" min="0" 
                                                    value="{{ $monture->pivot->prix_unitaire }}" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control row-total" readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row">
                                                    <i class='bx bx-trash'></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
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
                                        <input type="text" id="grand_total_display" class="form-control" readonly />
                                        <input type="hidden" name="total" id="grand_total_value">
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
    </div>
</div>

<!-- Templates for dynamic rows -->
<template id="verre-row-template">
    <tr>
        <td>
            <select class="form-select product-select" name="verres[__INDEX__][id]" required>
                <option value="">Sélectionner un verre</option>
                @foreach($verres as $verre)
                    <option value="{{ $verre->id }}" data-price="{{ $verre->prix_vente }}">
                        {{ $verre->index_verre }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" class="form-control quantity-input" name="verres[__INDEX__][quantite]" min="1" value="1" required>
        </td>
        <td>
            <input type="number" class="form-control price-input" name="verres[__INDEX__][prix_unitaire]" step="0.01" min="0" value="0.00" required>
        </td>
        <td>
            <input type="text" class="form-control row-total" readonly>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-row">
                <i class='bx bx-trash'></i>
            </button>
        </td>
    </tr>
</template>

<template id="lentille-row-template">
    <tr>
        <td>
            <select class="form-select product-select" name="lentilles[__INDEX__][id]" required>
                <option value="">Sélectionner une lentille</option>
                @foreach($lentilles as $lentille)
                    <option value="{{ $lentille->id }}" data-price="{{ $lentille->prix_vente }}">
                        {{ $lentille->libellé }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" class="form-control quantity-input" name="lentilles[__INDEX__][quantite]" min="1" value="1" required>
        </td>
        <td>
            <input type="number" class="form-control price-input" name="lentilles[__INDEX__][prix_unitaire]" step="0.01" min="0" value="0.00" required>
        </td>
        <td>
            <input type="text" class="form-control row-total" readonly>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-row">
                <i class='bx bx-trash'></i>
            </button>
        </td>
    </tr>
</template>

<template id="monture-row-template">
    <tr>
        <td>
            <select class="form-select product-select" name="montures[__INDEX__][id]" required>
                <option value="">Sélectionner une monture</option>
                @foreach($montures as $monture)
                    <option value="{{ $monture->id }}" data-price="{{ $monture->prix_vente }}">
                        {{ $monture->model_monture }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="number" class="form-control quantity-input" name="montures[__INDEX__][quantite]" min="1" value="1" required>
        </td>
        <td>
            <input type="number" class="form-control price-input" name="montures[__INDEX__][prix_unitaire]" step="0.01" min="0" value="0.00" required>
        </td>
        <td>
            <input type="text" class="form-control row-total" readonly>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-row">
                <i class='bx bx-trash'></i>
            </button>
        </td>
    </tr>
</template>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let rowIndexCounters = { verres: 0, lentilles: 0, montures: 0 };

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
        const template = document.getElementById(`${type.slice(0, -1)}-row-template`);
        const tbody = document.getElementById(`${type}-rows`);
        const index = rowIndexCounters[type]++;
        
        const newRowContent = template.innerHTML.replace(/__INDEX__/g, index);
        const newRow = document.createElement('tr');
        newRow.innerHTML = newRowContent;
        tbody.appendChild(newRow);
        
        initializeRowEvents(newRow);
        calculateRowTotal(newRow);
    }

    // Function to initialize event listeners for a row
    function initializeRowEvents(rowElement) {
        const quantityInput = rowElement.querySelector('.quantity-input');
        const priceInput = rowElement.querySelector('.price-input');
        const productSelect = rowElement.querySelector('.product-select');
        const removeButton = rowElement.querySelector('.remove-row');

        if (quantityInput) {
            quantityInput.addEventListener('input', () => calculateRowTotal(rowElement));
        }
        
        if (priceInput) {
            priceInput.addEventListener('input', () => calculateRowTotal(rowElement));
            priceInput.addEventListener('blur', () => {
                priceInput.value = formatCurrency(parseCurrency(priceInput.value));
                calculateRowTotal(rowElement);
            });
        }

        if (productSelect) {
            productSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const price = selectedOption.getAttribute('data-price');
                if (price !== null && priceInput) {
                    priceInput.value = formatCurrency(price);
                    calculateRowTotal(rowElement);
                }
            });
        }

        if (removeButton) {
            removeButton.addEventListener('click', function() {
                rowElement.remove();
                calculateGrandTotal();
            });
        }
    }

    // Add row buttons event listeners
    document.querySelectorAll('.add-row').forEach(button => {
        button.addEventListener('click', function() {
            addRow(this.getAttribute('data-type'));
        });
    });

    // Initialize existing rows
    document.querySelectorAll('#verres-rows tr, #lentilles-rows tr, #montures-rows tr').forEach(row => {
        initializeRowEvents(row);
        calculateRowTotal(row);
    });
    
    // Add at least one row for each type if empty
    if (document.getElementById('verres-rows').rows.length === 0) addRow('verres');
    if (document.getElementById('lentilles-rows').rows.length === 0) addRow('lentilles');
    if (document.getElementById('montures-rows').rows.length === 0) addRow('montures');
    
    // Initial calculation
    calculateGrandTotal();

    // Add event listener to the form for submission
    document.getElementById('vent-form').addEventListener('submit', function(e) {
        calculateGrandTotal(); // Ensure total is calculated before submission
    });
});
</script>
@endpush 