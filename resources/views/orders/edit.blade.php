@extends('layouts.auth')

@section('content')

<!-- showing errors if exist -->
@if ($errors->any())
<div class="alert alert-danger col-lg-3 mx-auto mt-5">
    <ul class="list-unstyled m-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
    <div class="alert alert-success col-lg-3 mx-auto mt-5">
        {{ session('success') }}
    </div>
@endif

<h1 class="text-center mt-5">Edit Order</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('orders.update', $order->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="order-date" class="form-label">New date</label>
        <input type="date" class="form-control" id="order-date" name="orderDate" value="{{ $order->order_date }}">
    </div>
    <div class="mb-3">
        <label for="total-price" class="form-label">New price</label>
        <input type="text" class="form-control" id="total-price" name="totalPrice" value="{{ $order->total_price }}">
    </div>
    <label for="customer" class="form-label">New customer</label>
    <select class="form-select mb-3" id="customer" name="customerId">
        @foreach($customers as $customer)
            <option value="{{ $customer->id }}" {{ $customer->id == $order->customer_id ? 'selected' : '' }}>
                {{ $customer->first_name }} {{ $customer->last_name }}
            </option>
        @endforeach
    </select>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary float-end">Submit Change</button>
</form>

@endsection