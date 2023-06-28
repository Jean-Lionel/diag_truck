<div>
    {{-- The whole world belongs to you. --}}
    <div class="row">
        <div class="row col-md-8">

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Numéro du patient</label>
                    <input type="text" class="form-control" wire:model="numberId" id="validationCustom01" value="Mark" wire:keyup.enter="searChPatient" required>
                    @error('numberId')
                    <div class="valid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Docteur</label>
                    <select class="form-control " name="" id="" wire:model="docteurId">
                        <option value="">-- Select --</option>
                        @foreach ($docteurs as $docteur )
                        <option value="{{ $docteur->id }}">
                            Dr - {{ $docteur->name }} {{ $docteur->lastName }}</option>
                        @endforeach
                    </select>
                     @error('docteurId')
                    <div class="valid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-12">
                    <button wire:click="saveVisite" class="btn btn-primary" type="submit">Submit form</button>
                </div>
        </div>
        <div class="col-md-4">

            @if ($patient)
            <div>
                <h1 class="display-5">
                    {{ $patient->first_name  }}
                    {{ $patient->last_name  }}
                </h1>
                <h1>Age : {{ $patient->age}} </h1>
                <h1 class="display-3">
                  N° :  {{ $patient->patientId  }}
                </h1>
            </div>
            @endif

        </div>
    </div>
</div>
