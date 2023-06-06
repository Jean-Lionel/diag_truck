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
                    <h4 class="card-title">{{ $patient?->first_name }}</h4>
                    <p class="card-text">{{ $patient?->last_name }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <textarea name="" wire:model="contenu" class="form-control form-control-sm" id="" cols="30" rows="10"></textarea>
    </div>
</div>
