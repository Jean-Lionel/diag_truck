@extends('layouts.app')

@section('content')
{{ $errors }}
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
    <form action="{{ route('user.store') }}" method="post">
        @method('POST')
        @include('user.form', ['title' => "Ajout du personnel"])
    </form>
@endsection
