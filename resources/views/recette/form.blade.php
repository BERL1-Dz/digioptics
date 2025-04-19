<!-- Client Information -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_nom">Nom du Client</label>
            <input type="text" class="form-control" id="client_nom" name="client_nom" value="{{ isset($recette) ? $recette->client_nom : old('client_nom') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_prenom">Prénom du Client</label>
            <input type="text" class="form-control" id="client_prenom" name="client_prenom" value="{{ isset($recette) ? $recette->client_prenom : old('client_prenom') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="client_telephone">Téléphone</label>
            <input type="text" class="form-control" id="client_telephone" name="client_telephone" value="{{ isset($recette) ? $recette->client_telephone : old('client_telephone') }}" required>
        </div>
    </div>
</div>
<!-- Far Vision (Vision de loin) -->
<div class="row mt-4">
    <h4>Vision de Loin</h4>
    <!-- Right Eye Prescription -->
    <div class="col-md-6">
        <h5>Œil Droit</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="oeil_droit_sphere">Sphère</label>
                    <select class="form-select form-select-lg" id="oeil_droit_sphere" name="oeil_droit_sphere">
                        <option value="">None</option>
                        @for ($i = -14.0; $i < 0.25; $i = $i + 0.25)
                            <option value="{{ $i }}" {{ (isset($recette) && $recette->oeil_droit_sphere == $i) || old('oeil_droit_sphere') == $i ? 'selected' : '' }}>
                                {{ number_format($i, 2) }}
                            </option>
                        @endfor
                        <option value="SPH" {{ (isset($recette) && $recette->oeil_droit_sphere == 'SPH') || old('oeil_droit_sphere') == 'SPH' ? 'selected' : '' }}>SPH</option>
                        <option value="PLAN" {{ (isset($recette) && $recette->oeil_droit_sphere == 'PLAN') || old('oeil_droit_sphere') == 'PLAN' ? 'selected' : '' }}>PLAN</option>
                        @for ($i = 0.25; $i < 9.25; $i = $i + 0.25)
                            <option value="+{{ $i }}" {{ (isset($recette) && $recette->oeil_droit_sphere == '+'.$i) || old('oeil_droit_sphere') == '+'.$i ? 'selected' : '' }}>
                                +{{ number_format($i, 2) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="oeil_droit_cylindre">Cylindre</label>
                    <select class="form-select form-select-lg" id="oeil_droit_cylindre" name="oeil_droit_cylindre">
                        <option value="">None</option>
                        @for ($i = -5.0; $i <= 5; $i = $i + 0.25)
                            <option value="{{ $i }}" {{ (isset($recette) && $recette->oeil_droit_cylindre == $i) || old('oeil_droit_cylindre') == $i ? 'selected' : '' }}>
                                {{ number_format($i, 2) }}
                            </option>
                        @endfor
                        <option value="SPH" {{ (isset($recette) && $recette->oeil_droit_cylindre == 'SPH') || old('oeil_droit_cylindre') == 'SPH' ? 'selected' : '' }}>SPH</option>
                        <option value="PLAN" {{ (isset($recette) && $recette->oeil_droit_cylindre == 'PLAN') || old('oeil_droit_cylindre') == 'PLAN' ? 'selected' : '' }}>PLAN</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="oeil_droit_axe">Axe</label>
                    <select class="form-select form-select-lg" id="oeil_droit_axe" name="oeil_droit_axe">
                        <option value="">None</option>
                        @for ($j = 0; $j <= 180; $j = $j + 1)
                            <option value="{{ $j }}" {{ (isset($recette) && $recette->oeil_droit_axe == $j) || old('oeil_droit_axe') == $j ? 'selected' : '' }}>
                                {{ number_format($j, 0) }}°
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Left Eye Prescription -->
    <div class="col-md-6">
        <h5>Œil Gauche</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="oeil_gauche_sphere">Sphère</label>
                    <select class="form-select form-select-lg" id="oeil_gauche_sphere" name="oeil_gauche_sphere">
                        <option value="">None</option>
                        @for ($i = -14.0; $i < 0.25; $i = $i + 0.25)
                            <option value="{{ $i }}" {{ (isset($recette) && $recette->oeil_gauche_sphere == $i) || old('oeil_gauche_sphere') == $i ? 'selected' : '' }}>
                                {{ number_format($i, 2) }}
                            </option>
                        @endfor
                        <option value="SPH" {{ (isset($recette) && $recette->oeil_gauche_sphere == 'SPH') || old('oeil_gauche_sphere') == 'SPH' ? 'selected' : '' }}>SPH</option>
                        <option value="PLAN" {{ (isset($recette) && $recette->oeil_gauche_sphere == 'PLAN') || old('oeil_gauche_sphere') == 'PLAN' ? 'selected' : '' }}>PLAN</option>
                        @for ($i = 0.25; $i < 9.25; $i = $i + 0.25)
                            <option value="+{{ $i }}" {{ (isset($recette) && $recette->oeil_gauche_sphere == '+'.$i) || old('oeil_gauche_sphere') == '+'.$i ? 'selected' : '' }}>
                                +{{ number_format($i, 2) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="oeil_gauche_cylindre">Cylindre</label>
                    <select class="form-select form-select-lg" id="oeil_gauche_cylindre" name="oeil_gauche_cylindre">
                        <option value="">None</option>
                        @for ($i = -5.0; $i <= 5; $i = $i + 0.25)
                            <option value="{{ $i }}" {{ (isset($recette) && $recette->oeil_gauche_cylindre == $i) || old('oeil_gauche_cylindre') == $i ? 'selected' : '' }}>
                                {{ number_format($i, 2) }}
                            </option>
                        @endfor
                        <option value="SPH" {{ (isset($recette) && $recette->oeil_gauche_cylindre == 'SPH') || old('oeil_gauche_cylindre') == 'SPH' ? 'selected' : '' }}>SPH</option>
                        <option value="PLAN" {{ (isset($recette) && $recette->oeil_gauche_cylindre == 'PLAN') || old('oeil_gauche_cylindre') == 'PLAN' ? 'selected' : '' }}>PLAN</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="oeil_gauche_axe">Axe</label>
                    <select class="form-select form-select-lg" id="oeil_gauche_axe" name="oeil_gauche_axe">
                        <option value="">None</option>
                        @for ($j = 0; $j <= 180; $j = $j + 1)
                            <option value="{{ $j }}" {{ (isset($recette) && $recette->oeil_gauche_axe == $j) || old('oeil_gauche_axe') == $j ? 'selected' : '' }}>
                                {{ number_format($j, 0) }}°
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Near Vision (Vision de Près) -->
<div class="row mt-4">
    <h4>Vision de Près</h4>
    <!-- Right Eye Prescription -->
    <div class="col-md-6">
        <h5>Œil Droit</h5>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oeil_droit_sphere_pres">Sphère</label>
                    <select class="form-select form-select-lg" id="oeil_droit_sphere_pres" name="oeil_droit_sphere_pres">
                        <option value="">None</option>
                        @for ($i = -14.0; $i < 0.25; $i = $i + 0.25)
                            <option value="{{ $i }}" {{ (isset($recette) && $recette->oeil_droit_sphere_pres == $i) || old('oeil_droit_sphere_pres') == $i ? 'selected' : '' }}>
                                {{ number_format($i, 2) }}
                            </option>
                        @endfor
                        <option value="SPH" {{ (isset($recette) && $recette->oeil_droit_sphere_pres == 'SPH') || old('oeil_droit_sphere_pres') == 'SPH' ? 'selected' : '' }}>SPH</option>
                        <option value="PLAN" {{ (isset($recette) && $recette->oeil_droit_sphere_pres == 'PLAN') || old('oeil_droit_sphere_pres') == 'PLAN' ? 'selected' : '' }}>PLAN</option>
                        @for ($i = 0.25; $i < 9.25; $i = $i + 0.25)
                            <option value="+{{ $i }}" {{ (isset($recette) && $recette->oeil_droit_sphere_pres == '+'.$i) || old('oeil_droit_sphere_pres') == '+'.$i ? 'selected' : '' }}>
                                +{{ number_format($i, 2) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oeil_droit_cylindre_pres">Cylindre</label>
                    <select class="form-select form-select-lg" id="oeil_droit_cylindre_pres" name="oeil_droit_cylindre_pres">
                        <option value="">None</option>
                        @for ($i = -5.0; $i <= 5; $i = $i + 0.25)
                            <option value="{{ $i }}" {{ (isset($recette) && $recette->oeil_droit_cylindre_pres == $i) || old('oeil_droit_cylindre_pres') == $i ? 'selected' : '' }}>
                                {{ number_format($i, 2) }}
                            </option>
                        @endfor
                        <option value="SPH" {{ (isset($recette) && $recette->oeil_droit_cylindre_pres == 'SPH') || old('oeil_droit_cylindre_pres') == 'SPH' ? 'selected' : '' }}>SPH</option>
                        <option value="PLAN" {{ (isset($recette) && $recette->oeil_droit_cylindre_pres == 'PLAN') || old('oeil_droit_cylindre_pres') == 'PLAN' ? 'selected' : '' }}>PLAN</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oeil_droit_axe_pres">Axe</label>
                    <select class="form-select form-select-lg" id="oeil_droit_axe_pres" name="oeil_droit_axe_pres">
                        <option value="">None</option>
                        @for ($j = 0; $j <= 180; $j = $j + 1)
                            <option value="{{ $j }}" {{ (isset($recette) && $recette->oeil_droit_axe_pres == $j) || old('oeil_droit_axe_pres') == $j ? 'selected' : '' }}>
                                {{ number_format($j, 0) }}°
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oeil_droit_addition">Addition</label>
                    <select class="form-select form-select-lg" id="oeil_droit_addition" name="oeil_droit_addition">
                        <option value="">None</option>
                        @for ($j = 0.75; $j <= 3.5; $j = $j + 0.25)
                            <option value="+{{ $j }}" {{ (isset($recette) && $recette->oeil_droit_addition == '+'.$j) || old('oeil_droit_addition') == '+'.$j ? 'selected' : '' }}>
                                +{{ number_format($j, 2) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Left Eye Prescription -->
    <div class="col-md-6">
        <h5>Œil Gauche</h5>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oeil_gauche_sphere_pres">Sphère</label>
                    <select class="form-select form-select-lg" id="oeil_gauche_sphere_pres" name="oeil_gauche_sphere_pres">
                        <option value="">None</option>
                        @for ($i = -14.0; $i < 0.25; $i = $i + 0.25)
                            <option value="{{ $i }}" {{ (isset($recette) && $recette->oeil_gauche_sphere_pres == $i) || old('oeil_gauche_sphere_pres') == $i ? 'selected' : '' }}>
                                {{ number_format($i, 2) }}
                            </option>
                        @endfor
                        <option value="SPH" {{ (isset($recette) && $recette->oeil_gauche_sphere_pres == 'SPH') || old('oeil_gauche_sphere_pres') == 'SPH' ? 'selected' : '' }}>SPH</option>
                        <option value="PLAN" {{ (isset($recette) && $recette->oeil_gauche_sphere_pres == 'PLAN') || old('oeil_gauche_sphere_pres') == 'PLAN' ? 'selected' : '' }}>PLAN</option>
                        @for ($i = 0.25; $i < 9.25; $i = $i + 0.25)
                            <option value="+{{ $i }}" {{ (isset($recette) && $recette->oeil_gauche_sphere_pres == '+'.$i) || old('oeil_gauche_sphere_pres') == '+'.$i ? 'selected' : '' }}>
                                +{{ number_format($i, 2) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oeil_gauche_cylindre_pres">Cylindre</label>
                    <select class="form-select form-select-lg" id="oeil_gauche_cylindre_pres" name="oeil_gauche_cylindre_pres">
                        <option value="">None</option>
                        @for ($i = -5.0; $i <= 5; $i = $i + 0.25)
                            <option value="{{ $i }}" {{ (isset($recette) && $recette->oeil_gauche_cylindre_pres == $i) || old('oeil_gauche_cylindre_pres') == $i ? 'selected' : '' }}>
                                {{ number_format($i, 2) }}
                            </option>
                        @endfor
                        <option value="SPH" {{ (isset($recette) && $recette->oeil_gauche_cylindre_pres == 'SPH') || old('oeil_gauche_cylindre_pres') == 'SPH' ? 'selected' : '' }}>SPH</option>
                        <option value="PLAN" {{ (isset($recette) && $recette->oeil_gauche_cylindre_pres == 'PLAN') || old('oeil_gauche_cylindre_pres') == 'PLAN' ? 'selected' : '' }}>PLAN</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oeil_gauche_axe_pres">Axe</label>
                    <select class="form-select form-select-lg" id="oeil_gauche_axe_pres" name="oeil_gauche_axe_pres">
                        <option value="">None</option>
                        @for ($j = 0; $j <= 180; $j = $j + 1)
                            <option value="{{ $j }}" {{ (isset($recette) && $recette->oeil_gauche_axe_pres == $j) || old('oeil_gauche_axe_pres') == $j ? 'selected' : '' }}>
                                {{ number_format($j, 0) }}°
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="oeil_gauche_addition">Addition</label>
                    <select class="form-select form-select-lg" id="oeil_gauche_addition" name="oeil_gauche_addition">
                        <option value="">None</option>
                        @for ($j = 0.75; $j <= 3.5; $j = $j + 0.25)
                            <option value="+{{ $j }}" {{ (isset($recette) && $recette->oeil_gauche_addition == '+'.$j) || old('oeil_gauche_addition') == '+'.$j ? 'selected' : '' }}>
                                +{{ number_format($j, 2) }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <!-- Frame and Lens Type -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="monture_id">Monture</label>
            <select class="form-control" id="monture_id" name="monture_id" wire:model="monture_id">
                <option value="">Sélectionner une monture</option>
                @foreach($montures as $monture)
                <option value="{{ $monture->id }}" data-price="{{ $monture->pv_monture }}">
                    {{ $monture->model_monture }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="type_verre">Type de Verre</label>
            <select class="form-control" id="type_verre" name="type_verre" required>
                <option value="">Sélectionner un type</option>
                <option value="HMC" {{ (isset($recette) && $recette->type_verre == 'HMC') || old('type_verre') == 'HMC' ? 'selected' : '' }}>HMC</option>
                <option value="HC" {{ (isset($recette) && $recette->type_verre == 'HC') || old('type_verre') == 'HC' ? 'selected' : '' }}>HC</option>
                <option value="BB" {{ (isset($recette) && $recette->type_verre == 'BB') || old('type_verre') == 'BB' ? 'selected' : '' }}>BB</option>
            </select>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="form-group">
            <label for="monture_price">Prix de la Monture</label>
            <div class="input-group">
                <input type="number" 
                       step="0.01" 
                       class="form-control" 
                       id="monture_price" 
                       name="monture_price"
                       wire:model="monture_price">
                <span class="input-group-text">DA</span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="lens_price">Prix des Verres</label>
            <div class="input-group">
                <input type="number" 
                       step="0.01" 
                       class="form-control" 
                       id="lens_price" 
                       name="lens_price"
                       wire:model="lens_price">
                <span class="input-group-text">DA</span>
            </div>
        </div>
    </div>
</div>

@livewire('recette-form', ['recette' => $recette ?? null])

<div class="row mt-4">
    <div class="col-12">
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="3">{{ isset($recette) ? $recette->notes : old('notes') }}</textarea>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        // Calculate remaining amount
        function calculateRemaining() {
            var total = parseFloat($('#total').val()) || 0;
            var paid = parseFloat($('#montant_paye').val()) || 0;
            var remaining = total - paid;
            $('#reste_a_payer').val(remaining.toFixed(2));
        }

        $('#total, #montant_paye').on('input', calculateRemaining);
    });
</script>
@endpush
