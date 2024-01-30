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

<h1 class="text-center mt-5">Create Customer</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('customers.store') }}">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="first-name" class="form-label">First name</label>
        <input type="text" class="form-control" id="first-name" name="firstName" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="last-name" class="form-label">Last name</label>
        <input type="text" class="form-control" id="last-name" name="lastName" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="phone-number" class="form-label">Phone number</label>
        <input type="text" class="form-control" id="phone-number" name="phoneNumber" autocomplete="off">
    </div>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary float-end">Submit Change</button>
</form>

@endsection