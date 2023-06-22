<div>
    {{-- Do your work, then step back. --}}
   <div class="row">
   <div class="col-12">
    <table>
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient }}</td>
                <td>
                    <a href="{{ route('prescription.show', $patient->id) }}">View détail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
</div>
