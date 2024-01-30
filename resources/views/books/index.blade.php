@extends('layouts.app')

@section('content')
<a href="{{ route('books.create') }}" class="btn btn-primary float-end">Add Book</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Price</th>
            <th>Publishment Date</th>
            <th>Publisher</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->publishment_date}}</td>
                <td>{{$book->publisher->publisher_name}}</td>
                <td>{{$book->genre}}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
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
        <li class="page-item {{ $books->currentPage() == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $books->previousPageUrl() }}">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $books->lastPage(); $i++)
            <li class="page-item {{ $i == $books->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $books->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ $books->currentPage() == $books->lastPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $books->nextPageUrl() }}">&raquo;</a>
        </li>
    </ul>
</nav>

@endsection