@extends('layouts.app')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>User name</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th>{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->created_at }}</td>
      <td>{{ $user->updated_at }}</td>
      <td>
        @if(Auth::user()->isAdmin() && $user->id != Auth::user()->id)
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary">Edit</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
        </td>
        @endif
    </tr>
    @endforeach
  </tbody>
</table>

<nav>
    <ul class="pagination">
        <li class="page-item {{ $users->currentPage() == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $users->previousPageUrl() }}">&laquo;</a>
        </li>

        @for ($i = 1; $i <= $users->lastPage(); $i++)
            <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $users->nextPageUrl() }}">&raquo;</a>
        </li>
    </ul>
</nav>

@endsection