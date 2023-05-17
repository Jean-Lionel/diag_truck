@php
    $patient;
    $title;
    $isUpdate ??= false;
@endphp
<div class="container">

    <div class="v-stack gap-2 col-8 offset-2">
        <h5>{{ $title }}</h5>
        @csrf
        <div class="row ">
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'first_name',
                'label' => 'Nom',
                'value' => $patient->first_name,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'last_name',
                'label' => 'Prénom',
                'value' => $patient->last_name,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'phone',
                'label' => 'Téléphone',
                'value' => $patient->phone,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'email',
                'label' => 'Email',
                'value' => $patient->email,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'cni',
                'label' => 'cni',
                'value' => $patient->cni,
            ])
            <div class="col-6">
                <div class="form-group">
                    <label for="">Sexe</label>
                    <select name="sexe" id="" class="form-control">
                        <option value=""></option>
                        <option value="HOMME" @if ($patient->sexe == 'HOMME') selected @endif>HOMME</option>
                        <option value="FEMME" @if ($patient->sexe == 'FEMME') selected @endif>FEMME</option>
                    </select>

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="team_id">Groupe</label>

                    @error('team_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="row
                        p-2">
            <button type="submit"
                class="btn btn-sm mt-4 btn-primary">{{ $isUpdate ? 'Modifier' : 'Enregistrer' }}</button>
        </div>
    </div>
