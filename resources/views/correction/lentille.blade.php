<div class="">
    <input type="text" name="type_vision" hidden value="3">
    <div class="row">
        <label for="html5-date-input" class="col-md-2 col-form-label">Date: </label>
        <div class="col-md-10">
            <input name="date" class="form-control" type="date" value="2021-06-18" id="html5-date-input">
        </div>
    </div>
    <div class="row">
        <div class="col mb-0">
            <label for="nameExLarge" class="form-label">Patient:</label>
            <select name="patient_id" class="form-control">
                @foreach ($patients as $patients)
                    <option value="{{ $patients->id }}">{{ $patients->nom }} {{ $patients->prenom }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>

    <!-- Table start-->
    <div class="d-flex">
        <div class="d-flex-column tab">
            <div class="cell cell-round"></div>
            <div class="cell cell-round">Right (OD)</div>
            <div class="cell cell-round">Left (OS)</div>
        </div>
        <div class="d-flex-column tab">
            <div class="cell cell-round">Power (PWR)</div>
            <div class="drop">

                <select name="sph_od" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option value="None">None</option>
                    @for ($i = -14.0; $i < 0.25; $i = $i + 0.25)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    <option value="SPH">SPH</option>
                    <option value="None">None</option>
                    @for ($i = 0.25; $i < 9.25; $i = $i + 0.25)
                        <option value="+{{ $i }}">+{{ $i }}</option>
                    @endfor
                </select>


            </div>
            <div class="drop">
                <select name="sph_og" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option value="None">None</option>
                    @for ($i = -14.0; $i < 0.25; $i = $i + 0.25)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    <option value="SPH">SPH</option>
                    <option value="None">None</option>
                    @for ($i = 0.25; $i < 9.25; $i = $i + 0.25)
                        <option value="+{{ $i }}">+{{ $i }}</option>
                    @endfor
                </select>
            </div>

        </div>
        <div class="d-flex-column tab">
            <div class="cell cell-round">Cylinder (CYL)</div>
            <div class="drop">

                <select name="cly_od"id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option value="None">None</option>
                    @for ($k = -5.0; $k <= 5; $k = $k + 0.25)
                        <option value="{{ $k }}">{{ $k }}</option>
                    @endfor
                    <option value="SPH">SPH</option>
                    <option value="None">None</option>
                    @for ($k = 0.25; $k <= 5.0; $k = $k + 0.25)
                        <option value="+{{ $k }}">+{{ $k }}</option>
                    @endfor
                </select>


            </div>
            <div class="drop">
                <select name="cly_og" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option value="None">None</option>
                    @for ($k = -5.0; $k <= 5; $k = $k + 0.25)
                        <option value="{{ $k }}">{{ $k }}</option>
                    @endfor
                    <option value="SPH">SPH</option>
                    <option value="None">None</option>
                    @for ($k = 0.25; $k <= 5.0; $k = $k + 0.25)
                        <option value="+{{ $k }}">+{{ $k }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="d-flex-column tab">
            <div class="cell cell-round">Axis (AXI)</div>
            <div class="drop">
                <select name="axe_od" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option>None</option>
                    @for ($j = 0; $j <= 180; $j = $j + 1)
                        <option value="{{ $j }}"°>{{ $j }}°</option>
                    @endfor
                </select>
            </div>
            <div class="drop">
                <select name="axe_og" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option>None</option>
                    @for ($j = 0; $j <= 180; $j = $j + 1)
                        <option value="{{ $j }}"°>{{ $j }}°</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="d-flex-column tab">
            <div class="cell cell-round">BC (BC)</div>
            <div class="drop">
                <select name="add_od" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option>None</option>
                    @for ($j = 0.75; $j <= 3.5; $j = $j + 0.25)
                        <option value="+{{ $j }}">+{{ $j }}</option>
                    @endfor
                </select>
            </div>
            <div class="drop">
                <select name="add_og" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option>None</option>
                    @for ($j = 0.75; $j <= 3.5; $j = $j + 0.25)
                        <option value="+{{ $j }}">+{{ $j }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="d-flex-column tab">
            <div class="cell cell-round">DIA (DIA)</div>
            <div class="drop">
                <select name="add_od" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option>None</option>
                    @for ($j = 0.75; $j <= 3.5; $j = $j + 0.25)
                        <option value="+{{ $j }}">+{{ $j }}</option>
                    @endfor
                </select>
            </div>
            <div class="drop">
                <select name="add_og" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option>None</option>
                    @for ($j = 0.75; $j <= 3.5; $j = $j + 0.25)
                        <option value="+{{ $j }}">+{{ $j }}</option>
                    @endfor
                </select>
            </div>
        </div>

    </div>
    <!-- Table End-->
    <div class='row'>
        <div class='col mb-0'>
            <label for="nameExLarge" class="form-label">Durabilite</label>
            <select name="option" class="form-select" aria-label="Default select example">
                <option selected>Choisir votre Durabilte</option>
                <option value="1">1 Jour</option>
                <option value="30">30 Jours</option>
                <option value="90">90 Jours</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col mb-0'>
            <label for="nameExLarge" class="form-label">Confort</label>
            <select name="option" class="form-select" aria-label="Default select example">
                <option selected>Choisir votre type confort</option>
                <option value="Standard">Standard</option>
                <option value="Super Doux">Super Doux</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col mb-0'>
            <label for="nameExLarge" class="form-label">Style</label>
            <select name="option" class="form-select" aria-label="Default select example">
                <option selected>Choisir votre style</option>
                <option value="Customiser">Customiser</option>
                <option value="Naturel">Naturel</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col mb-0'>
            <label for="nameExLarge" class="form-label">Options</label>
            <select name="option" class="form-select" aria-label="Default select example">
                <option selected>Choisir votre style</option>
                <option value="sans">Sans</option>
                <option value="Reactive UV">Reactive UV</option>
                <option value="lest a prisme">lest à prisme</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col mb-0'>
            <label for="nameExLarge" class="form-label">Couleurs</label>
            <select name="option" class="form-select" aria-label="Default select example">
                <option selected>Choisir votre couleur</option>
                <option value="sans">Sans</option>
                <option value="Aqua">Aqua</option>
                <option value="Bleu">Bleu</option>
                <option value="Vert">Vert</option>
                <option value="Gris">Gris</option>
                <option value="Maron">Maron</option>
                <option value="Orange">Orange</option>
                <option value="Violet">Violet</option>
                <option value="Rouge">Rouge</option>
                <option value="Metaliser">Metaliser</option>
                <option value="Blanc">Blanc</option>
                <option value="Jaune">Jaune</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col mb-0'>
            <label for="nameExLarge" class="form-label">Niveau de transparence</label>
            <select name="option" class="form-select" aria-label="Default select example">
                <option selected>Choisir votre niveau de transparence</option>
                <option value="sans">Sans</option>
                <option value="améliorant">améliorant</option>
                <option value="vibrant">vibrant</option>
                <option value="opaque">opaque</option>
                <option value="tinter">tinter</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col mb-0'>
            <label for="nameExLarge" class="form-label">Types</label>
            <select name="option" class="form-select" aria-label="Default select example">
                <option selected>Choisir votre type</option>
                <option value="sans">Sans</option>
                <option value="prescription">Prescription</option>
                <option value="toric">tyic</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col mb-0'>
            <label for="nameExLarge" class="form-label">Quantite</label>
            <select name="option" class="form-select" aria-label="Default select example">
                <option selected>Choisir votre Quantite</option>
                <option value="2 par pack">2 par pack</option>
                <option value="10 par pack">10 par pack</option>
                <option value="1 par pack">1 par pack</option>
            </select>
        </div>
    </div>
</div>

<style type="text/css">
    .cell-round {
        height: 50px;
        background-color: #f4f9ff;
        color: #3a4850;
        font: 700 14px/17px Roboto, Arial, sans-serif;
        padding: 15.5px 14.5px;
        text-align: left;

    }

    .cell {
        background-color: #bbbcff;
        border-top: 1px solid #dedede;
        color: #3a4850;
        font: 700 14px/17px Roboto, Arial, sans-serif;
        padding: 15.5px 14.5px;
        text-align: left;
    }

    .drop {
        border-top: 1px solid #dedede;
        border-bottom: 1px solid #dedede;
        color: #6b6b6b;
        font: 400 14px/17px Roboto, Arial, sans-serif;
        height: 49px;
        position: relative;
        white-space: nowrap;
        width: 100%;
    }

    .tab {
        border-left: 1px solid #dedede;
        border-right: 1px solid #dedede;
        border-bottom: 1px solid #dedede;
        width: 149px;
    }

    .form-select-custom {
        border: 0px solid #dedede !important;
        border-radius: 0rem !important;
    }
</style>
