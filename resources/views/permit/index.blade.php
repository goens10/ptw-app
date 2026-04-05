@extends('layouts.app')

@section('content')

<h1>List Permit</h1>

@if(session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('permits.create') }}">Tambah Permit</a>

<form method="GET" action="{{ route('permits.index') }}">
    <input type="text" name="search" placeholder="Cari permit..." value="{{ request('search') }}">
    <button type="submit">Cari</button>
</form>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Permit Number</th>
        <th>Request By</th>
        <th>Section</th>
        <th>Work Date</th>
        <th>Description</th>
        <th>Aksi</th>
    </tr>

    @foreach($permits as $permit)
    <tr>
        <td>{{ $permits->firstItem() + $loop->index }}</td>
        <td>{{ $permit->permit_number }}</td>
        <td>{{ $permit->request_by }}</td>
        <td>{{ $permit->section }}</td>
        <td>{{ $permit->work_date }}</td>
        <td>{{ $permit->description }}</td>
        <td>
            <button class="btn btn-sm btn-warning" type="button"
                onclick="window.location='{{ route('permits.edit', $permit->id) }}'">
                Edit
            </button>

            <form action="{{ route('permits.destroy', $permit->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                    onclick="return confirm('Yakin hapus?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $permits->links() }}

@endsection