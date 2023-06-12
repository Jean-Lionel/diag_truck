<div class="row">
    {{-- In work, do what you enjoy. --}}
    <div class="col-md-4">
        <div class="card" style="background-color:cadetblue; border-color:darkblue;">
            <div class="card-body">
                <div class="col-md-12">
                    <input type="text" wire:model="numeroPatient" class="form-control
                    form-control-sm" wire:keyup.enter="getPatient">
                </div>

                @if ($patient )
                <div class="row">

                    <div class="col-4">Full Name</div>
                    <div class="col-8">{{ $patient?->first_name }} {{ $patient?->last_name }}</div>
                    <div class="col-4">Mobile</div>
                    <div class="col-8">{{ $patient?->phone }}</div>
                    <div class="col-4">Address</div>
                    <div class="col-8">{{ $patient?->address }}</div>
                    <div class="col-4">Date Of Birth</div>
                    <div class="col-8">{{ $patient?->birthday }}</div>
                    <div class="col-4">Age</div>
                    <div class="col-8">{{ $patient?->birthday }}</div>
                    <div class="col-6">Date de création</div>
                    <div class="col-6">{{ $patient?->created_at }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <textarea name="" wire:model="contenu" class="form-control form-control-sm" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary" wire:click="saveDiagnostique">Enregistrer</button>
    </div>

    <div class="row">
        <div class="col-6">
            <ul>
                @if($diagnosctic_history)
                <h4>Diagnostic recent</h4>
                @foreach ($diagnosctic_history as $diagnostic)
                    <li>
                        {{ $diagnostic->contenu }}
                        {{ $diagnostic->created_at }}
                    </li>
                @endforeach
                @endif
            </ul>

        </div>
        <div class="col-6"></div>
    </div>
</div>
