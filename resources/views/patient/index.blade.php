{{-- @extends('layouts.app') --}}
@extends('layouts.app')

@section('content')
<div class="card" style="padding: 0;">
    <div class="card-header">

            <div class="d-flex justify-content-between">
                <h5 class="card-title">Liste des Patients</h5>
                <a href="{{ route('patient.create') }}" type="button" class="btn btn-primary btn-block">
                    <i class="bi bi-plus-circle"></i> Ajouter
                </a>
                
            </div>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered overflow-auto" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">#
                        </th>
                        <th class="th-sm">Patient ID
                        </th>
                        <th class="th-sm">Nom
                        </th>
                        <th class="th-sm">Prénom
                        </th>
                        <th class="th-sm">Age
                        </th>
                        <th class="th-sm">Adresse
                        </th>
                        <th class="th-sm">Téléphone
                        </th>
                        <th class="th-sm">Sexe
                        </th>
                        <th class="th-sm">Chef de Famille
                        </th>
                        <th class="th-sm">Groupe sanguin
                        </th>
                        <th class="th-sm">Nationalité
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($patients as $item)
                        <tr>
                            <td> {{ ++$loop->index }}</td>
                            <td>{{ $item->patientId }}</td>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ $item->age }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->sexe }}</td>
                            <td>{{ $item->chef_famille }}</td>
                            <td>{{ $item->groupe_sanguin }}</td>
                            <td>{{ $item->nationalite }}</td>
                            <td>
                                <a href="{{ route('patient.edit', $item) }}" class="btn-sm btn btn-primary"
                                    title="Modifier">
                                    <i class="bi bi-pencil-square"></i>
                                </a>




                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
