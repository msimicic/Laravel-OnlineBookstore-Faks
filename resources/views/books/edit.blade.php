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

<h1 class="text-center mt-5">Edit Book</h1>
<form class="col-lg-3 mx-auto" method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">New title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">New price</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $book->price }}">
    </div>
    <div class="mb-3">
        <label for="publishment-date" class="form-label">New publishment date</label>
        <input type="date" class="form-control" id="publishment-date" name="publishmentDate" value="{{ $book->publishment_date }}">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">New genre</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ $book->genre }}">
    </div>
    <label for="publisher" class="form-label">New publisher</label>
    <select class="form-select mb-3" id="publisher" name="publisherId">
        @foreach($publishers as $publisher)
            <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                {{ $publisher->publisher_name }}
            </option>
        @endforeach
    </select>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    <button type="submit" class="btn btn-primary float-end">Submit Change</button>
</form>

@endsection