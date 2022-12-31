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
                                        <Li>Monture : {{ $montures->marque_monture ?? 'none' }}</Li>
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
                border-top: 1px solid #d9dee3;
                color: #3a4850;
                font: 700 14px/17px Roboto, Arial, sans-serif;
                padding: 15.5px 14.5px;
                text-align: left;
            }

            .drop {
                /* border-top: 1px solid #000000; */
                /* border-bottom: 1px solid #000000; */
                color: #6b6b6b;
                font: 400 14px/17px Roboto, Arial, sans-serif;
                height: 49px;
                position: relative;
                white-space: nowrap;
                width: 100%;
            }

            .tab {
                border-left: 1px solid #d9dee3;
                /* border-right: 1px solid #000000;
                        border-bottom: 1px solid #000000; */
                /* width: 90px; */
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

        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex svg-illustration mb-3 gap-2">
                                    <span class="app-brand-logo demo">

                                        <img src="../assets/img/logo.jpg" style="width: 170px;">

                                    </span>
                                    <span class="app-brand-text demo text-body fw-bolder">Nom de l'Opticien</span>
                                </div>
                                <p class="mb-1">Office 149, 450 South Brand Brooklyn</p>

                                <p class="mb-0">Numero de telephone: (+213) {{ $corrections->patient->phone }}</p>
                                <p class="mb-1">Observation: <input placeholder="Sans observation"
                                        style="border: none; "></p>
                            </div>
                            <div>
                                <h4>N° #{{ $corrections->id }}</h4>
                                <div class="mb-2">
                                    <span class="me-1">Nom du client:</span>
                                    <span class="fw-semibold">{{ $corrections->patient->nom }}
                                        {{ $corrections->patient->prenom }}</span>
                                </div>
                                <div>
                                    <span class="me-1">Date:</span>
                                    <span class="fw-semibold">{{ $corrections->date }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            @if ($corrections->type_vision === 1)
                                <div class="d-flex justify-content-between" style="">
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
                                                    <div class="cell cell-round">{{ $corrections->interm ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->pres ?? 'none' }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex-column tab">
                                                <div class="cell cell-round">CYL</div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->cly_od ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->axe_od ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex-column tab">
                                                <div class="cell cell-round">Prisme</div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->sph_og ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->interm ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->pres ?? 'none' }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex-column tab">
                                                <div class="cell cell-round">CYL</div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->cly_og ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->axe_og ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}
                                                    </div>
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
                                <div class="d-flex justify-content-around" style="">
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
                                                    <div class="cell cell-round">{{ $corrections->interm ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->cly_od ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->axe_od ?? 'none' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex-column tab">
                                                <div class="cell cell-round">Add</div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_od ?? 'none' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex-column tab">
                                                <div class="cell cell-round">Prisme</div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->prise_od ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->interm ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->sph_og ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->cly_og ?? 'none' }}
                                                    </div>
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
                                                    <div class="cell cell-round">{{ $corrections->axe_og ?? 'none' }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex-column tab">
                                                <div class="cell cell-round">Add</div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}
                                                    </div>
                                                </div>
                                                <div class="drop">
                                                    <div class="cell cell-round">{{ $corrections->add_og ?? 'none' }}
                                                    </div>
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
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-top m-0">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th>Cost</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap">Vuexy Admin Template</td>
                                    <td class="text-nowrap">HTML Admin Template</td>
                                    <td>$32</td>
                                    <td>1</td>
                                    <td>$32.00</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">Frest Admin Template</td>
                                    <td class="text-nowrap">Angular Admin Template</td>
                                    <td>$22</td>
                                    <td>1</td>
                                    <td>$22.00</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">Apex Admin Template</td>
                                    <td class="text-nowrap">HTML Admin Template</td>
                                    <td>$17</td>
                                    <td>2</td>
                                    <td>$34.00</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap">Robust Admin Template</td>
                                    <td class="text-nowrap">React Admin Template</td>
                                    <td>$66</td>
                                    <td>1</td>
                                    <td>$66.00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="align-top px-4 py-5">
                                        <p class="mb-2">
                                            <span class="me-1 fw-semibold">Salesperson:</span>
                                            <span>Alfie Solomons</span>
                                        </p>
                                        <span>Thanks for your business</span>
                                    </td>
                                    <td class="text-end px-4 py-5">
                                        <p class="mb-2">Subtotal:</p>
                                        <p class="mb-2">Discount:</p>
                                        <p class="mb-2">Tax:</p>
                                        <p class="mb-0">Total:</p>
                                    </td>
                                    <td class="px-4 py-5">
                                        <p class="fw-semibold mb-2">$154.25</p>
                                        <p class="fw-semibold mb-2">$00.00</p>
                                        <p class="fw-semibold mb-2">$50.00</p>
                                        <p class="fw-semibold mb-0">$204.25</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <span class="fw-semibold">Note:</span>
                                <span>It was a pleasure working with you and your team. We hope you will keep us in mind for
                                    future freelance
                                    projects. Thank You!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas"
                            data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="bx bx-paper-plane bx-xs me-1"></i>Envoyer par Email </span>
                        </button>
                        <button class="btn btn-outline-secondary d-grid w-100 mb-3">
                            Telecharger le PDF
                        </button>
                        <a class="btn btn-outline-secondary d-grid w-100 mb-3" target="_blank"
                            href="./app-invoice-print.html">
                            Imprimer le PDF
                        </a>
                        <a href="./app-invoice-edit.html" class="btn btn-outline-secondary d-grid w-100 mb-3">
                            Modification
                        </a>
                        <button class="btn btn-primary d-grid w-100" data-bs-toggle="offcanvas"
                            data-bs-target="#addPaymentOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="bx bx-dollar bx-xs me-1"></i>Add Payment</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    @endsection
