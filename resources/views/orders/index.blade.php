@extends('layouts.app')

@section('content')
<a href="{{ route('orders.create') }}" class="btn btn-primary float-end">Add Order</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Order Date</th>
            <th>Total Price</th>
            <th>Customer</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->customer->first_name}} {{$order->customer->last_name}}</td>
                <td>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
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
        <li class="page-item {{ $orders->currentPage() == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $orders->previousPageUrl() }}">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $orders->lastPage(); $i++)
            <li class="page-item {{ $i == $orders->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ $orders->currentPage() == $orders->lastPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $orders->nextPageUrl() }}">&raquo;</a>
        </li>
    </ul>
</nav>

@endsection