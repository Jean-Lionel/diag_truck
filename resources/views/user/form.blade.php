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
            'name' => 'lastName',
            'label' => 'Prénom',
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

            {{-- @include('shared.input', [
            'class' => 'col-6',
            'name' => '',
            'label' => 'Email',
            'value' => $patient->email,
            ]) --}}
            @include('shared.input', [
            'class' => 'col-6',
            'name' => 'password',
            'type' => 'password',
            'label' => 'Password',
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
                    <option value="DOCTEUR"
                    @if ($user->role_name == "DOCTEUR")
                    selected
                    @endif
                    >DOCTEUR</option>
                    <option value="INFIRMIER"
                    @if ($user->role_name == "INFIRMIER")
                    selected
                    @endif
                    >INFIRMIER</option>
                    <option value="ADMIN"
                    @if ($user->role_name == "ADMIN")
                    selected
                    @endif
                    >ADMIN</option>
                </select>

            </div>
            <div class="col-md-6" id="show_infirmier">
                {{-- <div class="row"> --}}
                    {{-- <div class="col-6"> --}}
                        <label for="">Groupe</label>
                        <select name="groupe" id="" class="form-control form-control-sm">
                            <option value=""></option>
                            <option value="GROUPE I">GROUPE I</option>
                            <option value="GROUPE II">GROUPE II</option>
                            <option value="GROUPE III">GROUPE III</option>
                            <option value="GROUPE IV">GROUPE IV</option>
                            <option value="GROUPE V">GROUPE V</option>
                        </select>
                    {{-- </div> --}}
                    {{-- <div class="col-6">
                        <label for="Qualification">Qualification</label>
                        <select name="qualification" id="Qualification" class="form-control form-control-sm">
                            <option value=""></option>
                            <option value="Infirmier Specialisé">Infirmier Specialisé</option>
                            <option value="Infirmier Généraliste">Infirmier Généraliste</option>
                        </select>
                    </div> --}}
                {{-- </div> --}}
            </div>
            <div class="col-md-6" id="show_docteur">
                <label for="">Specialité</label>
                <select name="specialite" id="" class="form-control form-control-sm">
                    <option value=""></option>
                    <option value="Généraliste">Généraliste</option>
                    <option value="Pédiatrie">Pédiatre</option>
                    <option value="Pédiatrie">Cardilogue</option>
                    <option value="Pédiatrie">Gynecologue</option>
                </select>

            </div>
                <div class="row
                p-2">
                <button type="submit"
                class="btn btn-sm mt-4 btn-primary">{{ $isUpdate ? 'Modifier' : 'Enregistrer' }}</button>
            </div>
        </div>


        @section("scripts")
        <script>
            $('#show_infirmier').hide();
            $('#show_docteur').hide();
            $('#role_name').on('change', function(e){
                if(e.target.value   == 'INFIRMIER'){
                    $('#show_infirmier').show();
                    $('#show_docteur').hide();
                }else if(e.target.value == 'DOCTEUR'){
                    $('#show_infirmier').hide();
                    $('#show_docteur').show();
                }else{
                    $('#show_infirmier').hide();
                    $('#show_docteur').hide();
                }
            })
        </script>

        @stop



