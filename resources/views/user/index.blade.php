{{-- @extends('layouts.app') --}}
@extends('layouts.app')

@section('content')
    <div class="card" style="padding: 0;">
        <div class="card-header">

            <div class="d-flex justify-content-between">
                <h5 class="card-title">Liste du personnels</h5>
                <a href="{{ route('user.create') }}" type="button" class="btn btn-primary btn-block">
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

                        <th class="th-sm">Nom
                        </th>
                        <th class="th-sm">Prénom
                        </th>
                        <th class="th-sm">Téléphone
                        </th>
                        <th class="th-sm">Email
                        </th>
                        <th class="th-sm">Role
                        </th>
                        <th class="th-sm">Sexe
                        </th>

                        <th class="th-sm">Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $item)
                        <tr>
                            <td> {{ ++$loop->index }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->lastName }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role_name }}</td>
                            <td>{{ $item->sexe }}</td>
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
