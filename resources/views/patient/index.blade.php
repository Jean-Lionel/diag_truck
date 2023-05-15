@extends('layouts.app')

@section('content')
    <div class="card" style="padding: 0;">
        <div class="card-header">

            <div class="d-flex justify-content-between">
                <h5 class="card-title">Liste des Membres</h5>
                <a href="{{ route('patient.create') }}" type="button" class="btn btn-primary btn-block">
                    <i class="bi bi-plus-circle"></i> Ajouter
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">#
                        </th>
                        <th class="th-sm">Compte
                        </th>
                        <th class="th-sm">Nom
                        </th>
                        <th class="th-sm">Prénom
                        </th>
                        <th class="th-sm">Sexe
                        </th>
                        <th class="th-sm">Groupe
                        </th>
                        <th class="th-sm">Téléphone
                        </th>
                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($members as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->compte->name }}</td>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->sexe }}</td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ $item->team->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a href="{{ route('member.edit', $item) }}" class="btn-sm btn btn-primary" title="Modifier">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('member.abandon', $item) }}" title="Supprimer"
                                    class="btn-sm btn btn-danger">
                                    <i class="bi bi-dash-circle-fill" title="Abadon"></i>

                                </a>
                                <a href="{{ route('member.edit', $item) }}" title="Supprimer"
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
