@extends('layouts.app')

@section('content')
<a href="{{ route('authors.create') }}" class="btn btn-primary float-end">Add Author</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->id}}</td>
                <td>{{$author->first_name}}</td>
                <td>{{$author->last_name}}</td>
                <td>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline">
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
        <li class="page-item {{ $authors->currentPage() == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $authors->previousPageUrl() }}">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $authors->lastPage(); $i++)
            <li class="page-item {{ $i == $authors->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $authors->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ $authors->currentPage() == $authors->lastPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $authors->nextPageUrl() }}">&raquo;</a>
        </li>
    </ul>
</nav>

@endsection