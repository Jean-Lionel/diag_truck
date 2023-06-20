
    @extends('layouts.app')

    @section('content')
      <div class="row">
        <div class="col-md-6">
           <img src="{{ asset('assets/patient.png') }}" alt="">
        </div>
        <div class="col-md-6">
           <div class="container">
            <h4 class="">Nom et Prénom : {{ $patient->fullName }}</h4>
            <hr>
            <h4 class="text-danger">Age : {{ $patient->age }}</h4>
            <hr>
            <h4 class="text-danger">Numéro du patient : {{ $patient->patientId }}</h4>
            <hr>

           </div>

           <div class="card">
            <h4>Prescription</h4>
           </div>
        </div>
      </div>
    @endsection

