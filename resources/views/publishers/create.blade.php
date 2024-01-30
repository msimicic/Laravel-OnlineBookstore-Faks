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

<h1 class="text-center mt-5">Create Publisher</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('publishers.store') }}">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="city" class="form-label">Publisher city</label>
        <input type="text" class="form-control" id="city" name="city" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="publisher-name" class="form-label">Publisher name</label>
        <input type="text" class="form-control" id="publisher-name" name="publisherName" autocomplete="off">
    </div>
    <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary float-end">Submit Change</button>
</form>

@endsection