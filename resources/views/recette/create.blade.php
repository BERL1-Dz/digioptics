@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Créer un nouveau Bon de commande</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('recette.store') }}" method="POST">
                        @csrf
                        @php
                            // Create a dummy empty Recette object
                            $recette = new App\Models\Recette();
                        @endphp
                        @include('recette.form', ['recette' => $recette])
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <a href="{{ route('recette.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 