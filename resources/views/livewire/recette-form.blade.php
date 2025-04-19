{{-- <div class="row mt-4">
    <!-- Vision Prescription -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="vision_loin">Vision de Loin</label>
            <input type="text" class="form-control" id="vision_loin" wire:model="vision_loin">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="vision_pres">Vision de Près</label>
            <input type="text" class="form-control" id="vision_pres" wire:model="vision_pres">
        </div>
    </div>
</div> --}}

<div>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="total" class="form-label">Total</label>
            <div class="input-group">
                <input type="number" 
                       step="0.01" 
                       class="form-control @error('total') is-invalid @enderror" 
                       id="total" 
                       name="total"
                       wire:model="total"
                       required>
                <span class="input-group-text">DA</span>
                @error('total')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="montant_paye" class="form-label">Montant Payé</label>
            <div class="input-group">
                <input type="number" 
                       step="0.01" 
                       class="form-control @error('montant_paye') is-invalid @enderror" 
                       id="montant_paye" 
                       name="montant_paye"
                       wire:model="montant_paye"
                       required>
                <span class="input-group-text">DA</span>
                @error('montant_paye')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <label for="reste_a_payer" class="form-label">Reste à Payer</label>
            <div class="input-group">
                <input type="number" 
                       step="0.01" 
                       class="form-control" 
                       id="reste_a_payer" 
                       name="reste_a_payer"
                       wire:model="reste_a_payer"
                       readonly>
                <span class="input-group-text">DA</span>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            function formatNumber(number) {
                return new Intl.NumberFormat('fr-FR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(number);
            }

            Livewire.on('calculationsUpdated', () => {
                const elements = ['total', 'montant_paye', 'reste_a_payer', 'monture_price'];
                elements.forEach(id => {
                    const input = document.getElementById(id);
                    if (input) {
                        const value = parseFloat(input.value);
                        if (!isNaN(value)) {
                            input.setAttribute('data-formatted', formatNumber(value));
                        }
                    }
                });
            });
        });
    </script>
    @endpush
</div> 