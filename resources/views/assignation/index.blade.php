{{-- @extends('layouts.app') --}}
@extends('layouts.app')

@section('content')
    <div class="card" style="padding: 0;">
        <div class="card-header">

            <div class="d-flex justify-content-between">
                <h5 class="card-title">Historique </h5>
                <a href="{{ route('assignation.create') }}" type="button" class="btn btn-primary btn-block">
                    <i class="bi bi-plus-circle"></i> Nouveau
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                        <th class="th-sm">Date de  naissnace
                        </th>
                        <th class="th-sm">Visite du Docteur
                        </th>
                        <th>Date</th>

                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($assignations as $item)
                        <tr>
                            <td> {{ ++$loop->index }}</td>
                            <td>{{ $item->patient?->patient_id }}</td>
                            <td>{{ $item->patient?->first_name }}</td>
                            <td>{{ $item->patient?->last_name }}</td>
                            <td>{{ $item->patient?->birthday }}</td>
                            <th>Dr {{ $item->infirmier?->name }}</th>
                            <td>{{  $item->created_at}}</td>

                            <td>
                                <a href="{{ route('patient.edit', $item) }}" class="btn-sm btn btn-primary"
                                    title="Modifier">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="{{ route('patient.edit', $item) }}" title="Supprimer"
                                    class="btn-sm btn btn-danger">
                                    <i class="bi bi-trash" title="Supprimer"></i>
                                </a>


                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
    </div>
@endsection
