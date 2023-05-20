@extends('layouts.dashboard')

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
    <form action="{{ route('patient.store') }}" method="post">
        @method('POST')
        @include('patient.form', ['title' => 'Ajouter un Patient'])
    </form>
@endsection
