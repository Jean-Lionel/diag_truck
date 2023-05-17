@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
    <form action="{{ route('patient.update', $patient) }}" method="post">
        @method('PUT')

        @include('patient.form', [
            'title' => 'Modification ',
            'isUpdate' => true,
        ])
    </form>
@endsection
