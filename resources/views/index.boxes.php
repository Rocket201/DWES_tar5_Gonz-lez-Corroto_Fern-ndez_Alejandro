@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Boxes</h1>

    <a href="{{ route('boxes.create') }}" class="btn btn-primary">Add New Box</a>

    <table class="table">
        <thead>
            <tr>
                <th>Label</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boxes as $box)
                <tr>
                    <td>{{ $box->label }}</td>
                    <td>{{ $box->location }}</td>
                    <td>
                        <a href="{{ route('boxes.show', $box) }}">View</a>
                        <a href="{{ route('boxes.edit', $box) }}">Edit</a>
                        <form method="POST" action="{{ route('boxes.destroy', $box) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection