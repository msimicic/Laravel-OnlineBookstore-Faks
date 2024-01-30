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

<h1 class="text-center mt-5">Create Book</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('books.store') }}">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="publishment-date" class="form-label">Publishment date</label>
        <input type="date" class="form-control" id="publishment-date" name="publishmentDate">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="publisher" class="form-label">Publisher</label>
        <select class="form-select" id="publisher" name="publisherId">
            <option value="" disabled selected>Please select publisher</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary float-end">Submit Change</button>
</form>

@endsection