
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

            <div class="row">
                <div class="col-md-10">
                    <h4 class="m-2">Prescription</h4>
                </div>
                <div class="col-md-2 text-right">
                    <button class="btn btn-sm btn-info">Ajouter</button>
                </div>
            </div>

            <table>
                <thead>

                </thead>
                <tbody>

                </tbody>
            </table>
            <hr>
            <h4 class="m-2">Diagnostic</h4>
            <table class="m-2">
                <thead>

                </thead>
                <tbody>

                    @foreach ($patient->diagnostics as  $item)
                    <tr>
                        <td>{{ $item->contenu }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

