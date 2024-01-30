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

<h1 class="text-center mt-5">Edit Customer</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('customers.update', $customer->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="first-name" class="form-label">New first name</label>
        <input type="text" class="form-control" id="first-name" name="firstName" value="{{ $customer->first_name }}">
    </div>
    <div class="mb-3">
        <label for="last-name" class="form-label">New last name</label>
        <input type="text" class="form-control" id="last-name" name="lastName" value="{{ $customer->last_name }}">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">New address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}">
    </div>
    <div class="mb-3">
        <label for="phone-number" class="form-label">New phone number</label>
        <input type="text" class="form-control" id="phone-number" name="phoneNumber" value="{{ $customer->phone_number }}">
    </div>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary float-end">Submit Change</button>
</form>

@endsection