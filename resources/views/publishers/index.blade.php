@extends('layouts.app')

@section('content')
<a href="{{ route('publishers.create') }}" class="btn btn-primary float-end">Add Publisher</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>City</th>
            <th>Publisher Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($publishers as $publisher)
            <tr>
                <td>{{$publisher->id}}</td>
                <td>{{$publisher->city}}</td>
                <td>{{$publisher->publisher_name}}</td>
                <td>
                    <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" class="d-inline">
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
        <li class="page-item {{ $publishers->currentPage() == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $publishers->previousPageUrl() }}">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $publishers->lastPage(); $i++)
            <li class="page-item {{ $i == $publishers->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $publishers->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ $publishers->currentPage() == $publishers->lastPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $publishers->nextPageUrl() }}">&raquo;</a>
        </li>
    </ul>
</nav>

@endsection