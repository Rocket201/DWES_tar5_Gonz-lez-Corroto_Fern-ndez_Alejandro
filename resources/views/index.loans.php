@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Loan History</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Borrower</th>
                <th>Loan Date</th>
                <th>Return Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->item->name }}</td>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->loan_date }}</td>
                    <td>{{ $loan->return_date }}</td>
                    <td>
                        @if ($loan->is_open && Auth::user()->id == $loan->user_id)
                            <form method="POST" action="{{ route('loans.return', $loan) }}">
                                @csrf
                                <button type="submit">Return</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection