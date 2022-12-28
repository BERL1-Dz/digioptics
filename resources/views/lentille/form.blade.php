<div class="row">
    <div class="col">
        <label for="emailWithTitle" class="form-label">Code Fournisseur:</label>
        <select name="code_fournisseur" class="form-control" required>
            @foreach ($fournisseurs as $fournisseur)
                <option value="{{ $fournisseur->id }}">{{ $fournisseur->code_fournisseur }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Fabricant: </label>
        <input type="text" class="form-control" placeholder="BNLFR" required name="fabriquant_lentille" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Libellé: </label>
        <input type="text" id="dobWithTitle" class="form-control" placeholder="PureVision 6L" required name="libellé" />
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Port/Jour: </label>
        <input type="number" class="form-control" placeholder="1" required name="port" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Teinte :</label>
        <input type="text" id="dobWithTitle" class="form-control" placeholder="GREEN" name="teinte" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Conditionnement :</label>
        <input type="number" id="dobWithTitle" class="form-control" placeholder="90" name="conditionnement" />
    </div>
</div>

<div class="row mt-1 g-2">
    <div class="col mt-1">
        <label for="emailWithTitle" class="form-label">Essie: </label>
        <input type="text" class="form-control" placeholder="OUI" required name="essie" />
    </div>
    <div class="col mt-1">
        <label for="dobWithTitle" class="form-label">Pv_Lentille</label>
        <input type="number" id="dobWithTitle" class="form-control" placeholder="Pv_lentille" required name="pv_lentille" />
    </div>
</div>
