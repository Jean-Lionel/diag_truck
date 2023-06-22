<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <button class="btn btn-sm btn-info" wire:click="openForm">Ajouter</button>

    @if ($showForm)

    <form action="" class="m-2" wire:submit.prevent="savePrescription">
        <div class="form-group">
            <label for="">Medicament</label>
            <select name="" wire:model="medicament" id="" class="form-control form-control-sm">
                <option value=""></option>
                @foreach ($medicaments as $medicament )
                <option value="{{ $medicament->id }}">{{ $medicament->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Dose</label>
            <input type="text" wire:model="dose" class="form-control form-control-sm">
        </div>
        <button class="btn btn-block btn-info">Erengistrer</button>
    </form>

    @endif

    <table class="table">

        <tbody>
            @foreach ($prescriptions as $prescription)
            <tr>
                <th>{{ $prescription->medicament->name  }}</th>
                <th>{{ $prescription->dose  }}</th>
                <th>{{ $prescription->created_at  }}</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
