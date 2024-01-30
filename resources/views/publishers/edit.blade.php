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

<h1 class="text-center mt-5">Edit Publisher</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('publishers.update', $publisher->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="city" class="form-label">New city</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ $publisher->city }}">
    </div>
    <div class="mb-3">
        <label for="publisher-name" class="form-label">New publisher name</label>
        <input type="text" class="form-control" id="publisher-name" name="publisherName" value="{{ $publisher->publisher_name }}">
    </div>
    <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary float-end">Submit Change</button>
</form>

@endsection