@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-6">
            <small class="text-light fw-semibold">Contenu de la facture</small>
            <div class="demo-inline-spacing mt-3">
                <div class="list-group">
                    <a href="javascript:void(0);"
                        class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex justify-content-between w-100">
                            <h6>Facture pour : {{ $data['facture_pour'] }}</h6>
                            <small>N° Facture : {{ $data['n_facture'] }}</small>
                        </div>

                        <small class="mt-2">Date : {{ $data['date'] }}</small>
                    </a>
                    <a href="javascript:void(0);"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex justify-content-between w-100">
                            <div class="row">
                                <div class="flex-column">
                                    <h6>Designation :</h6>
                                    @foreach ($data['designation'] as $arrayData)
                                        <li class="text-muted">{{ $arrayData }}</li>
                                    @endforeach
                                </div>
                                <Div class="flex-column mt-2">
                                    <h6>Quantite :</h6>
                                    @foreach ($data['quantite'] as $arrayData)
                                        <li class="text-muted">{{ $arrayData }}</li>
                                    @endforeach
                                    <h6>Reference :</h6>
                                    @foreach ($data['ref'] as $arrayData)
                                        <li>{{ $arrayData }}</li>
                                    @endforeach
                                </Div>
                            </div>
                            <div class="row">
                                <div class="flex-column">
                                    <h6>Prix Unitaire :</h6>
                                    @foreach ($data['p_unitaire'] as $arrayData)
                                        <li class="text-muted">{{ $arrayData }} Da</li>
                                    @endforeach
                                </div>
                                <div class="flex-column">
                                    <h6>Montant : </h6>
                                    @foreach ($data['montant'] as $arrayData)
                                        <li class="text-muted"><small class="text-muted">{{ $arrayData }} Da</small></li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="javascript:void(0);"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <p>T.H.T : {{ $data['t_h_t'] }}</p>
                            <p>T.V.A % : {{ $data['t_v_a_p'] }}%</p>
                            <p>T.V.A : {{ $data['t_v_a'] }}</p>
                            <p>T.T.C : {{ $data['t_t_c'] }}</p>
                        </div>
                        <div class="d-flex justify-content-center w-100 mt-3">
                            <h5>T.T.C : <small class="text-muted">{{ $data['t_t_c'] }} Da</small></h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
