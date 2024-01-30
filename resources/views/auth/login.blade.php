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

<h1 class="text-center mt-5">Login</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('authenticate') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ env('LOGIN_SEED_EMAIL', '') }}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ env('LOGIN_SEED_PASSWORD', '') }}">
    </div>
    <a href="{{ route('users.create') }}" class="btn btn-secondary">Register</a>
    <button type="submit" class="btn btn-primary float-end">Login</button>
</form>
@endsection