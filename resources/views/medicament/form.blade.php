@php
    $medicament;
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
                'value' => $medicament->medicament,
            ])
            @include('shared.input', [
                'class' => 'col-6',
                'name' => 'description',
                'label' => 'Déscription',
                'type' => 'textarea',
                'value' => $medicament->description,
            ])


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
