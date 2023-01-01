<div class="row">
    <div class="col mb-0">
        <label for="nameExLarge" class="form-label">Patient:</label>
        <select name="patient_id" class="form-control">
            @foreach ($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->nom }} {{ $patient->prenom }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row g-3">
    <div class="col mb-0" id="ref_input">
        <label for="nameExLarge" class="form-label">Ref.</label>
        <div style="display:flex;align-items: baseline;">
            <button id="rowAdder_ref" type="button" class="btn btn-success valval"
                style="border-radius: 5px 0px 0px 5px;">
                <i class='bx bxs-plus-square'></i>
            </button>
            <input type="text" name="ref[]" id="ref_0" class="form-control ref" placeholder="Ref." required
                style="border-radius: 0px 5px 5px 0px;" />
        </div>
        <div id="newinput_ref"></div>
    </div>

    <div class="row g-2">
        <div class="col mb-0">
            <label for="nameExLarge" class="form-label">N° Facture:</label>
            <input type="number" id="nameExLarge" class="form-control" placeholder="N° Facture" name="n_facture"
                required />
        </div>

        <div class="col mb-0">
            <label for="dobExLarge" class="form-label">Date</label>
            <input type="text" id="dobExLarge" class="form-control" placeholder="DD / MM / YY" / name="date"
                required />
        </div>

    </div>

    <div class="row g-2">
        <div class="col mb-0">
            <label for="emailExLarge" class="form-label">Designation</label>
            <div style="display:flex;align-items: baseline;">
            <button id="rowAdder_des" type="button" class="btn btn-success valval"
                style="border-radius: 5px 0px 0px 5px;">
                <i class='bx bxs-plus-square'></i>
            </button>
            <input type="text" id="emailExLarge" class="form-control" placeholder="Designation" name="designation[]"
            style="border-radius: 0px 5px 5px 0px;"  required />
            </div>
            <div id="newinput_des"></div>
        </div>

        <div class="col mb-0">
            <label for="dobExLarge" class="form-label">Quantite</label>
            <div style="display:flex;align-items: baseline;">
                <button id="rowAdder_quantite" type="button" class="btn btn-success valval"
                    style="border-radius: 5px 0px 0px 5px;">
                    <i class='bx bxs-plus-square'></i>
                </button>
            <input type="number" id="dobExLarge" class="form-control" placeholder="Quantite" name="quantite[]"
            style="border-radius: 0px 5px 5px 0px;" required />
            </div>
            <div id="newinput_quantite"></div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col mb-0">
            <label for="emailExLarge" class="form-label">Prix Unitaire</label>
            <div style="display:flex;align-items: baseline;">
                <button id="rowAdder_p-uni" type="button" class="btn btn-success valval"
                    style="border-radius: 5px 0px 0px 5px;">
                    <i class='bx bxs-plus-square'></i>
                </button>
            <input type="number" id="emailExLarge" class="form-control" placeholder="Prix Unitaire" name="p_unitaire[]"
            style="border-radius: 0px 5px 5px 0px;" required />
            </div>
            <div id="newinput_p-uni"></div>
        </div>
        <div class="col mb-0">
            {{-- <label for="dobExLarge" class="form-label">Montant</label>
            <input type="number" id="dobExLarge" class="form-control" placeholder="Montant" name="montant" required /> --}}
            <label for="emailExLarge" class="form-label">Montant</label>
            <div style="display:flex;align-items: baseline;">
                <button id="rowAdder_montant" type="button" class="btn btn-success valval"
                    style="border-radius: 5px 0px 0px 5px;">
                    <i class='bx bxs-plus-square'></i>
                </button>
            <input type="number" id="emailExLarge" class="form-control" placeholder="Prix Unitaire" name="montant[]"
            style="border-radius: 0px 5px 5px 0px;" required />
            </div>
            <div id="newinput_montant"></div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col mb-0">
            <label for="emailExLarge" class="form-label">T.H.T</label>
            <input type="number" id="emailExLarge" class="form-control" placeholder="T.H.T" name="t_h_t" />
        </div>
        <div class="col mb-0">
            <label for="dobExLarge" class="form-label">T.V.A %</label>
            <input type="number" id="dobExLarge" class="form-control" placeholder="T.V.A % " name="t_v_a_p" />
        </div>

        <div class="col mb-0">
            <label for="dobExLarge" class="form-label">T.V.A</label>
            <input type="number" id="dobExLarge" class="form-control" placeholder="T.V.A " name="t_v_a" />
        </div>

        <div class="col mb-0">
            <label for="dobExLarge" class="form-label">T.T.C</label>
            <input type="number" id="dobExLarge" class="form-control" placeholder="T.T.C " name="t_t_c" />
        </div>
    </div>

    <div class="col mb-0">
        <label for="nameExLarge" class="form-label">Total</label>
        <input type="number" id="nameExLarge" class="form-control" placeholder="Total" name="total" required />
    </div>
