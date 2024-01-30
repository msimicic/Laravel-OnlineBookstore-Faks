@extends('layouts.app')

@section('content')
<a href="{{ route('customers.create') }}" class="btn btn-primary float-end">Add Customer</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->last_name}}</td>
                <td>{{$customer->phone_number}}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<nav>
    <ul class="pagination">
        <li class="page-item {{ $customers->currentPage() == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $customers->previousPageUrl() }}">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $customers->lastPage(); $i++)
            <li class="page-item {{ $i == $customers->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $customers->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ $customers->currentPage() == $customers->lastPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $customers->nextPageUrl() }}">&raquo;</a>
        </li>
    </ul>
</nav>

@endsection