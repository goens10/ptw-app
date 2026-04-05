@extends('layouts.app')

@section('content')

<h1>Tambah Permit</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('permits.store') }}" method="POST">
    @csrf

    @include('permit._form', ['button' => 'Simpan'])
</form>

@endsection