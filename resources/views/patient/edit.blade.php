@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Modifier le Patient</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('update', $patient->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('patient.form')
                        
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="{{ route('patient.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
