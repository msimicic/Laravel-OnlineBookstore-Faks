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

<h1 class="text-center mt-5">Create Order</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('orders.store') }}">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="order-date" class="form-label">Order date</label>
        <input type="date" class="form-control" id="order-date" name="orderDate">
    </div>
    <div class="mb-3">
        <label for="total-price" class="form-label">Order total price</label>
        <input type="text" class="form-control" id="total-price" name="totalPrice" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="customer" class="form-label">Select Customer</label>
        <select class="form-select" id="customer" name="customerId">
            <option value="" disabled selected>Please select customer</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary float-end">Submit Change</button>
</form>

@endsection