{{-- @extends('layouts.app') --}}
@extends('layouts.app')

@section('content')
<div class="card" style="padding: 0;">
    <div class="card-header">

        <div class="d-flex justify-content-between">
            <h5 class="card-title">Liste des Medicaments</h5>
            <a href="{{ route('medicament.create') }}" type="button" class="btn btn-primary btn-block">
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

                    <th class="th-sm">Déscription
                    </th>

                    <th class="th-sm">Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($medicaments as $item)
                <tr>
                    <td> {{ ++$loop->index }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>

                    <td>
                        <a href="{{ route('medicament.edit', $item) }}" class="btn-sm btn btn-primary"
                        title="Modifier">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form class="form-delete" action="{{ route('medicament.destroy' , $item) }}" style="display: inline;" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-outline-danger btn-sm delete_client" onclick="return confirm('Are you sure ? ')"> <i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach


        </tbody>

    </table>
</div>
</div>
@endsection
