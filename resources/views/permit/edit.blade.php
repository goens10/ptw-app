@extends('layouts.app')

@section('content')

<h1>Edit Permit</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('permits.update', $permit->id) }}" method="POST">
    @csrf
    @method('PUT')

    @include('permit._form', ['button' => 'Update'])
</form>

@endsection