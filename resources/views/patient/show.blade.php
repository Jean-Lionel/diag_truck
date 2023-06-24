@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card p-4">

            <div class="text-center">
                <img style="width: 200px;" src="{{ asset('assets/patient.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
            </div>

            <div class="card-box text-center">

                <div class="text-left mt-3">

                    <p class="text-muted mb-2 font-13"><strong>Nom et Prénom :</strong> <span class="ml-2">{{ $patient->full_name }}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Téléphone :</strong><span class="ml-2">{{ $patient->phone }}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Adresse :</strong> <span class="ml-2">{{ $patient->address}}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Date de Naissance :</strong> <span class="ml-2">{{ $patient->birthday  }}</span></p>
                    <p class="text-muted mb-2 font-13"><strong>Age :</strong> <span class="ml-2">{{ $patient->age}}</span></p>

                    <hr>
                    <p class="text-muted mb-2 font-13"><strong>Date d'enregistrement :</strong> <span class="ml-2"> {{ $patient->created_at }}</span></p>
                    <hr>
                </div>

            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card">

        </div>
    </div>
</div>
@endsection
