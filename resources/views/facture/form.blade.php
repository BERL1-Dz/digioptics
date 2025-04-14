<div class="row">
    <div class="col mb-0">
        <label for="nameExLarge" class="form-label">Patient:</label>
        <select name="patient_id" class="form-control" required>
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->nom }} {{ $patient->prenom }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row g-3">
    <div class="col mb-0">
        <label for="n_facture" class="form-label">N° Facture:</label>
        <input type="text" id="n_facture" class="form-control" placeholder="N° Facture" name="n_facture" required />
    </div>
    <div class="col mb-0">
        <label for="date" class="form-label">Date</label>
        <input type="date" id="date" class="form-control" name="date" required />
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="invoiceTable">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Désignation</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Montant</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="ref[]" class="form-control" placeholder="Ref." />
                        </td>
                        <td>
                            <input type="text" name="designation[]" class="form-control" placeholder="Designation" required />
                        </td>
                        <td>
                            <input type="number" name="quantite[]" class="form-control quantite" placeholder="Quantite" min="0" step="1" required />
                        </td>
                        <td>
                            <input type="number" name="p_unitaire[]" class="form-control p-unitaire" placeholder="Prix Unitaire" min="0" step="0.01" required />
                        </td>
                        <td>
                            <input type="number" name="montant[]" class="form-control montant" placeholder="Montant" readonly />
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-row">
                                <i class='bx bxs-minus-square'></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-success" id="addRow">
                <i class='bx bxs-plus-square'></i> Ajouter une ligne
            </button>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6 offset-md-6">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>T.H.T</th>
                    <td><input type="number" name="t_h_t" class="form-control" id="t_h_t" readonly /></td>
                </tr>
                <tr>
                    <th>T.V.A %</th>
                    <td><input type="number" name="t_v_a_p" class="form-control" id="t_v_a_p" value="20" /></td>
                </tr>
                <tr>
                    <th>T.V.A</th>
                    <td><input type="number" name="t_v_a" class="form-control" id="t_v_a" readonly /></td>
                </tr>
                <tr>
                    <th>T.T.C</th>
                    <td><input type="number" name="t_t_c" class="form-control" id="t_t_c" readonly /></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    // Wait for the DOM to be fully loaded
    window.addEventListener('load', function() {
        console.log('Script loaded'); // Debug log

        const table = document.getElementById('invoiceTable');
        const tbody = table.querySelector('tbody');
        const addRowBtn = document.getElementById('addRow');

        // Function to safely parse float
        function safeParseFloat(value) {
            const parsed = parseFloat(value);
            return isNaN(parsed) ? 0 : parsed;
        }

        // Function to calculate row amount
        function calculateRowAmount(row) {
            console.log('Calculating row amount'); // Debug log
            const quantite = safeParseFloat(row.querySelector('.quantite').value);
            const pUnitaire = safeParseFloat(row.querySelector('.p-unitaire').value);
            const montant = quantite * pUnitaire;
            
            const montantInput = row.querySelector('.montant');
            if (montantInput) {
                montantInput.value = montant.toFixed(2);
                console.log('Montant calculated:', montant.toFixed(2)); // Debug log
            }
            
            calculateTotals();
        }

        // Function to calculate all totals
        function calculateTotals() {
            console.log('Calculating totals'); // Debug log
            let t_ht = 0;
            const montants = document.querySelectorAll('.montant');
            montants.forEach(montant => {
                t_ht += safeParseFloat(montant.value);
            });

            const t_ht_input = document.getElementById('t_h_t');
            const tva_p_input = document.getElementById('t_v_a_p');
            const tva_input = document.getElementById('t_v_a');
            const ttc_input = document.getElementById('t_t_c');

            t_ht_input.value = t_ht.toFixed(2);
            
            const tva_p = safeParseFloat(tva_p_input.value);
            const tva = t_ht * (tva_p / 100);
            const ttc = t_ht + tva;

            tva_input.value = tva.toFixed(2);
            ttc_input.value = ttc.toFixed(2);
        }

        // Function to add new row
        function addNewRow() {
            console.log('Adding new row'); // Debug log
            const newRow = document.createElement('tr');
            const rowCount = tbody.querySelectorAll('tr').length;
            
            newRow.innerHTML = `
                <td>
                    <input type="text" name="ref[]" class="form-control" placeholder="Ref." />
                </td>
                <td>
                    <input type="text" name="designation[]" class="form-control" placeholder="Designation" required />
                </td>
                <td>
                    <input type="number" name="quantite[]" class="form-control quantite" placeholder="Quantite" min="0" step="1" required />
                </td>
                <td>
                    <input type="number" name="p_unitaire[]" class="form-control p-unitaire" placeholder="Prix Unitaire" min="0" step="0.01" required />
                </td>
                <td>
                    <input type="number" name="montant[]" class="form-control montant" placeholder="Montant" readonly />
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-row">
                        <i class='bx bxs-minus-square'></i>
                    </button>
                </td>
            `;
            
            tbody.appendChild(newRow);

            // Add event listeners to new row inputs
            const quantiteInput = newRow.querySelector('.quantite');
            const pUnitaireInput = newRow.querySelector('.p-unitaire');

            quantiteInput.addEventListener('input', () => calculateRowAmount(newRow));
            pUnitaireInput.addEventListener('input', () => calculateRowAmount(newRow));
        }

        // Add event listener for add row button
        if (addRowBtn) {
            console.log('Add row button found'); // Debug log
            addRowBtn.addEventListener('click', addNewRow);
        } else {
            console.log('Add row button not found'); // Debug log
        }

        // Remove row functionality
        table.addEventListener('click', function(e) {
            if (e.target.closest('.remove-row')) {
                e.target.closest('tr').remove();
                calculateTotals();
            }
        });

        // Add event listeners to initial row
        const initialRow = tbody.querySelector('tr');
        if (initialRow) {
            console.log('Initial row found'); // Debug log
            const quantiteInput = initialRow.querySelector('.quantite');
            const pUnitaireInput = initialRow.querySelector('.p-unitaire');

            quantiteInput.addEventListener('input', () => calculateRowAmount(initialRow));
            pUnitaireInput.addEventListener('input', () => calculateRowAmount(initialRow));
        } else {
            console.log('Initial row not found'); // Debug log
        }

        // Add event listener for TVA percentage change
        const tvaPInput = document.getElementById('t_v_a_p');
        if (tvaPInput) {
            tvaPInput.addEventListener('input', calculateTotals);
        }

        // Initialize calculations for existing rows
        const rows = tbody.querySelectorAll('tr');
        rows.forEach(row => {
            calculateRowAmount(row);
        });
    });
</script>
