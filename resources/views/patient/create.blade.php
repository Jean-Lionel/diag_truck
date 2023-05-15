@extends('layouts.app')

@section('content')
    <form action="{{ route('patient.store') }}" method="post">
        @method('POST')
        @include('patient.form', ['title' => 'Ajouter un groupe'])
    </form>
@endsection
