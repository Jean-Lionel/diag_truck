@extends('layouts.app')

@section('content')
    <form action="{{ route('patient.update', $patient) }}" method="post">
        @method('PUT')

        @include('patient.form', [
            'title' => 'Modification ',
            'isUpdate' => true,
        ])
    </form>
@endsection
