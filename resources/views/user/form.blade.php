@php
    $user;
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
                'label' => 'Prénom',
                'value' => $patient->first_name,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'last_name',
                'label' => 'Nom',
                'value' => $patient->last_name,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'birthday',
                'label' => 'Date de naissance',
                'value' => $patient->birthday,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'address',
                'label' => 'Adresse',
                'value' => $patient->address,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'phone',
                'label' => 'Téléphone',
                'value' => $patient->phone,
            ])
            {{-- @include('shared.input', [
                'class' => 'col-6',
                'name' => '',
                'label' => 'Email',
                'value' => $patient->email,
            ]) --}}
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'chef_famille',
                'label' => 'Chef de Famille',
                'value' => $patient->chef_famille,
            ])
            <div class="col-6">
                <div class="form-group">
                    <label for="">Sexe</label>
                    <select name="sexe" id="" class="form-control @error('sexe') is-invalid @enderror">
                        <option value=""></option>
                        <option value="HOMME" @if ($patient->sexe == 'HOMME') selected @endif>HOMME</option>
                        <option value="FEMME" @if ($patient->sexe == 'FEMME') selected @endif>FEMME</option>
                    </select>
                    @error('sexe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            {{-- <div class="col-md-12">
                <div class="form-group">
                    <label for="team_id">Groupe</label>
                    <select name="team_id" id="team_id"
                        class="form-control form-control-sm  @error('team_id') is-invalid @enderror">
                        <option value="">...select</option>
                        {{-- @foreach ($teams as $team)
                            <option value="{{ $team->id }}" @if ($team->id == $member?->team?->id) selected @endif>
                                {{ $team->name }}</option>
                        @endforeach
                    </select>

                    @error('team_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div> --}}

        </div>
        <div class="row
                        p-2">
            <button type="submit"
                class="btn btn-sm mt-4 btn-primary">{{ $isUpdate ? 'Modifier' : 'Enregistrer' }}</button>
        </div>
    </div>
