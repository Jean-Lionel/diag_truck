<div>
    {{-- Do your work, then step back. --}}
   <div class="row">
   <div class="col-12">
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
                        <th class="th-sm">Age
                        </th>
                        <th class="th-sm">Sexe
                        </th>
                        <th class="th-sm">Chef de Famille
                        </th>
                        <th class="th-sm">Nationalité
                        </th>
                        <th class="th-sm">Groupe sanguin
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
                <td>{{ $item->sexe }}</td>
                <td>{{ $item->chef_famille }}</td>
                <td>{{ $item->groupe_sanguin }}</td>
                <td>{{ $item->nationalite }}</td>
                <td>
                    {{-- <a href="{{ route('prescription.show', $item->id) }}">View détail</a> --}}
                    <a href="{{ route('prescription.show', $item->id) }}" class="btn-sm btn btn-primary" title="Voir Detail">

                            <i class="bi bi-eye"></i>
                        </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
</div>
