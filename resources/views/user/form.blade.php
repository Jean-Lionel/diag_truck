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
                'name' => 'name',
                'label' => 'Nom',
                'value' => $user->name,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'Prénom',
                'label' => 'lastName',
                'value' => $user->lastName,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'phone',
                'label' => 'Phone',
                'value' => $user->phone,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'email',
                'label' => 'email',
                'value' => $user->email,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'birthday',
                'label' => 'Date de Naissance',
                'value' => $user->birthday,
            ])
            {{-- @include('shared.input', [
                'class' => 'col-6',
                'name' => '',
                'label' => 'Email',
                'value' => $patient->email,
            ]) --}}
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'password',
                'label' => 'Password',
                'value' => $user->password,
            ])
            <div class="col-6">
                <div class="form-group">
                    <label for="">Sexe</label>
                    <select name="sexe" id="" class="form-control @error('sexe') is-invalid @enderror">
                        <option value=""></option>
                        <option value="HOMME" @if ($user->sexe == 'HOMME') selected @endif>HOMME</option>
                        <option value="FEMME" @if ($user->sexe == 'FEMME') selected @endif>FEMME</option>
                    </select>
                    @error('sexe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
        </div>

        <div class="col-md-6">
            <label for="">Rôle</label>

            <select name="role_name" id="role_name" class="form-control form-control-sm">
                <option value=""></option>
                <option value="DOCTEUR">DOCTEUR</option>
                <option value="INFIRMIER">INFIRMIER</option>
                <option value="ADMIN">ADMIN</option>
            </select>

        </div>
        <div class="row
                        p-2">
            <button type="submit"
                class="btn btn-sm mt-4 btn-primary">{{ $isUpdate ? 'Modifier' : 'Enregistrer' }}</button>
        </div>
    </div>
