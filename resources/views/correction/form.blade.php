<div class="">

    <div class="row">
        Patient:
        <select name="patient_id" class="form-control">
            @foreach ($patients as $patients)
                <option value="{{ $patients->nom }}">{{ $patients->nom }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="d-flex">
        <div class="d-flex-column tab">
            <div class="cell cell-round"></div>
            <div class="cell cell-round">Right (OD)</div>
            <div class="cell cell-round">Left (OS)</div>
        </div>
        <div class="d-flex-column tab">
            <div class="cell cell-round">Sphere (SPH)</div>
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
                    @for ($i = -5.0; $i <= 5; $i = $i + 0.25)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    <option value="SPH">SPH</option>
                    <option value="None">None</option>
                    @for ($i = 0.25; $i <= 5.0; $i = $i + 0.25)
                        <option value="+{{ $i }}">+{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="drop">
                <select name="cly_og" id="largeSelect" class="form-select form-select-custom form-select-lg">
                    <option value="None">None</option>
                    @for ($i = -5.0; $i <= 5; $i = $i + 0.25)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                    <option value="SPH">SPH</option>
                    <option value="None">None</option>
                    @for ($i = 0.25; $i <= 5.0; $i = $i + 0.25)
                        <option value="+{{ $i }}">+{{ $i }}</option>
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
        background-color: #f4f9ff;
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
