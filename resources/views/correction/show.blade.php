@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-{{ 'none' }} mb-4">
            <div class="card">
                <h5 class="card-header">Recu : XXX</h5>
                <div class="card-body">
                    <div class="d-flex align-items-baseline justify-content-around " style="border: 1px solid #000">
                        <div class="d-flex-column mr-2">
                            <ul>
                                <li>
                                    <h5>{{ $corrections->patient->nom }} {{ $corrections->patient->prenom }}</h5>
                                </li>
                                <li>
                                    <h5>Obsevation: <input placeholder="Sans observation"></h5>
                                </li>
                                <li>
                                    <h5>{{ $corrections->patient->phone }}</h5>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex-column">
                            <div class="column" style="display: -webkit-inline-box">
                                <h1>N°</h1>
                                <h1>0000{{ $corrections->id }}</h1>
                            </div>
                            <div class="">
                                <ul>
                                    <li>{{ $corrections->date }}</li>
                                    <li>Livraison Prevue</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @if ($corrections->type_vision === 1)
                        <div class="d-flex justify-content-around" style="border: 1px solid #000">
                            <div class="self-align-center">
                                <div class="d-flex">
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">OD</div>
                                        <div class="cell cell-round">Loin</div>
                                        <div class="cell cell-round">Interm</div>
                                        <div class="cell cell-round">Pres</div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">SPH</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->sph_od }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->interm ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->pres ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">CYL</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->cly_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">AXI</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->axe_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Add</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Prisme</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Base</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->base ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->base ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->base ?? 'none' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="self-align-center">
                                <div class="d-flex">
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">OG</div>
                                        <div class="cell cell-round">Loin</div>
                                        <div class="cell cell-round">Interm</div>
                                        <div class="cell cell-round">Pres</div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">SPH</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->sph_og ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->interm ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->pres ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">CYL</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->cly_og ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">AXI</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->axe_og ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Add</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Prisme</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Base</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-around" style="border: 1px solid #000">
                            <div class="self-align-center">
                                <div class="d-flex">
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">OD</div>
                                        <div class="cell cell-round">Loin</div>
                                        <div class="cell cell-round">Interm</div>
                                        <div class="cell cell-round">Pres</div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">SPH</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->interm ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->sph_od }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">CYL</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->cly_od ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">AXI</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->axe_od ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Add</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Prisme</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Base</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->base ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->base ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->base ?? 'none' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="self-align-center">
                                <div class="d-flex">
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">OG</div>
                                        <div class="cell cell-round">Loin</div>
                                        <div class="cell cell-round">Interm</div>
                                        <div class="cell cell-round">Pres</div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">SPH</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->pres ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->interm ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->sph_og ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">CYL</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->cly_og ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">AXI</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->axe_og ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Add</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Prisme</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex-column tab">
                                        <div class="cell cell-round">Base</div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                        <div class="drop">
                                            <div class="cell cell-round">{{ 'none' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <Li hidden>{{ $corrections->type_vision }}</Li>
                    @if ($corrections->type_vision === 1)
                        <div class="d-flex " style="border: 1px solid #000">
                            <div class="d-flex-column w-100 ">
                                <div class="p-2 text-align-center"
                                    style="border: 1px solid #000; text-align:center; font-weight:bold;font-size:18px">Loin
                                </div>
                                <div class="p-2 "style="border: 1px solid #000">
                                    <ul>
                                        <Li>OD: | {{ $corrections->sph_od ?? 'none' }} |
                                            {{ $corrections->cly_od ?? 'none' }} | {{ $corrections->option ?? 'none' }}
                                        </Li>
                                        <Li>OG: | {{ $corrections->sph_og ?? 'none' }} |
                                            {{ $corrections->cly_og ?? 'none' }} | {{ $corrections->option ?? 'none' }}
                                        </Li>
                                        <Li>Monture : {{ $montures->model_monture ?? 'none' }}</Li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex-column flex-shrink-1" style=" width: 25%;">

                                <div class="p-2 "
                                    style="border: 1px solid #000; text-align:center; font-weight:bold; font-size:18px">
                                    Prix
                                </div>
                                <div class="p-2 "style="border: 1px solid #000">
                                    <ul>
                                        <Li>800.00</Li>
                                        <Li>800.00</Li>
                                        <Li>7000.00 </Li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex " style="border: 1px solid #000">
                            <div class="d-flex-column w-100 ">
                                <div class="p-2 text-align-center"
                                    style="border: 1px solid #000; text-align:center; font-weight:bold;font-size:18px">Pres
                                </div>
                                <div class="p-2 "style="border: 1px solid #000">
                                    <ul>
                                        <Li>OD: | {{ 'none' }} | {{ 'none' }} | {{ 'none' }} </Li>
                                        <Li>OG: | {{ 'none' }} | {{ 'none' }} | {{ 'none' }} </Li>
                                        <Li>Monture : {{ 'none' }}</Li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex-column flex-shrink-1" style=" width: 25%;">

                                <div class="p-2 "
                                    style="border: 1px solid #000; text-align:center; font-weight:bold; font-size:18px">
                                    Prix
                                </div>
                                <div class="p-2 "style="border: 1px solid #000">
                                    <ul>
                                        <Li>800.00</Li>
                                        <Li>800.00</Li>
                                        <Li>7000.00 </Li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @else{
                        <div class="d-flex " style="border: 1px solid #000">
                            <div class="d-flex-column w-100 ">
                                <div class="p-2 text-align-center"
                                    style="border: 1px solid #000; text-align:center; font-weight:bold;font-size:18px">Loin
                                </div>
                                <div class="p-2 "style="border: 1px solid #000">
                                    <ul>
                                        <Li>OD: | {{ 'none' }} | {{ 'none' }} | {{ 'none' }} </Li>
                                        <Li>OG: | {{ 'none' }} | {{ 'none' }} | {{ 'none' }}
                                        </Li>
                                        <Li>Monture : {{ 'none' }}</Li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex-column flex-shrink-1" style=" width: 25%;">

                                <div class="p-2 "
                                    style="border: 1px solid #000; text-align:center; font-weight:bold; font-size:18px">
                                    Prix
                                </div>
                                <div class="p-2 "style="border: 1px solid #000">
                                    <ul>
                                        <Li>800.00</Li>
                                        <Li>800.00</Li>
                                        <Li>7000.00 </Li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="d-flex " style="border: 1px solid #000">
                            <div class="d-flex-column w-100 ">
                                <div class="p-2 text-align-center"
                                    style="border: 1px solid #000; text-align:center; font-weight:bold;font-size:18px">Pres
                                </div>
                                <div class="p-2 "style="border: 1px solid #000">
                                    <ul>
                                        <Li>OD: | {{ $corrections->sph_od ?? 'none' }} |
                                            {{ $corrections->cly_od ?? 'none' }} | {{ $corrections->option ?? 'none' }}
                                        </Li>
                                        <Li>OG: | {{ $corrections->sph_og ?? 'none' }} |
                                            {{ $corrections->cly_og ?? 'none' }} | {{ $corrections->option ?? 'none' }}
                                        </Li>
                                        <Li>Monture : {{ $montures->model_monture ?? 'none' }}</Li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex-column flex-shrink-1" style=" width: 25%;">

                                <div class="p-2 "
                                    style="border: 1px solid #000; text-align:center; font-weight:bold; font-size:18px">
                                    Prix
                                </div>
                                <div class="p-2 "style="border: 1px solid #000">
                                    <ul>
                                        <Li>800.00</Li>
                                        <Li>800.00</Li>
                                        <Li>7000.00 </Li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        }
                    @endif

                    <div class="d-flex " style="border: 1px solid #000">
                        <div class="d-flex-column w-100 ">
                            <div class="p-2 text-align-center"
                                style="border: 1px solid #000; text-align:center; font-weight:bold;font-size:18px">
                                Accessoires
                            </div>
                            <div class="p-2 "style="border: 1px solid #000">
                                <ul>
                                    <Li>Accessoire 1: X</Li>
                                    <Li>Accessoire 1: X</Li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex-column flex-shrink-1" style=" width: 25%;">

                            <div class="p-2 "
                                style="border: 1px solid #000; text-align:center; font-weight:bold; font-size:18px">Prix
                            </div>
                            <div class="p-2 "style="border: 1px solid #000">
                                <ul>
                                    <Li>000.00</Li>
                                    <Li>000.00</Li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex " style="border: 1px solid #000">
                        <div class="d-flex w-100 ">
                            <div class="p-2 flex-fill bd-highlight"
                                style="border: 1px solid #000; text-align:center; font-weight:bold;font-size:18px">RAP :
                                4500.00DA</div>
                            <div class="p-2 flex-fill bd-highlight"
                                style="border: 1px solid #000; text-align:center; font-weight:bold;font-size:18px">REM :
                                100.00DA</div>
                            <div class="p-2 flex-fill bd-highlight"
                                style="border: 1px solid #000;text-align:center; font-weight:bold;font-size:18px">Encaisse
                                : 4000.00DA
                            </div>
                            <div class="d-flex-column flex-shrink-1" style=" width: 20%;">

                                <div class="p-2 "
                                    style="border: 1px solid #000; text-align:center; font-weight:bold; font-size:18px">
                                    Total : 8600.00Da
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style type="text/css">
            .cell-round {
                height: 49px;
                background-color: #f4f9ff00;
                color: #3a4850;
                font: 700 14px/17px Roboto, Arial, sans-serif;
                padding: 15.5px 14.5px;
                text-align: left;

            }

            .cell {
                background-color: #f7f7f700;
                border-top: 1px solid #000000;
                color: #3a4850;
                font: 700 14px/17px Roboto, Arial, sans-serif;
                padding: 15.5px 14.5px;
                text-align: left;
            }

            .drop {
                border-top: 1px solid #000000;
                /* border-bottom: 1px solid #000000; */
                color: #6b6b6b;
                font: 400 14px/17px Roboto, Arial, sans-serif;
                height: 49px;
                position: relative;
                white-space: nowrap;
                width: 100%;
            }

            .tab {
                border-left: 1px solid #000000;
                border-right: 1px solid #000000;
                border-bottom: 1px solid #000000;
                width: 90px;
            }

            @media only screen and (max-width: 1620px) {
                .tab {
                    width: auto;
                }
            }


            .form-select-custom {
                border: 0px solid #000000 !important;
                border-radius: 0rem !important;
            }

            .cellmin1 {
                font-weight: bold;
            }

            .cellmin2 {
                width: 90px;
                border: 1px solid;
            }
        </style>
    @endsection
