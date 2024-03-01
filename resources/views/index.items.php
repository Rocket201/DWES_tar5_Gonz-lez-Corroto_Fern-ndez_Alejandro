@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Items</h1>

    <a href="{{ route('items.create') }}" class="btn btn-primary">Add New Item</a>

    <form method="GET" action="{{ route('items.index') }}">
        <input type="text" name="search" placeholder="Search items by name">
        <button type="submit">Search</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Box</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->box->name }}</td>
                    <td>
                        <a href="{{ route('items.show', $item) }}">View</a>
                        <a href="{{ route('items.edit', $item) }}">Edit</a>
                        <form method="POST" action="{{ route('items.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{ route('items.loan', $item) }}">Loan</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection