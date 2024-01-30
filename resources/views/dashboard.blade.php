@extends('layouts.app')

@section('content')

@auth
<h2>Welcome, {{ auth()->user()->name }}!</h2>
@endauth
<hr />

<!-- bootstrap panels with 4 counters -->
<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Number of authors: {{ $counters['authors'] }}
                </h5>
                <a href="{{ route('authors.index') }}" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Number of books: {{ $counters['books'] }}
                </h5>
                <a href="{{ route('books.index') }}" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Number of customers: {{ $counters['customers'] }}
                </h5>
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Number of orders: {{ $counters['orders'] }}
                </h5>
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Number of publishers: {{ $counters['publishers'] }}
                </h5>
                <a href="{{ route('publishers.index') }}" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Number of users: {{ $counters['users'] }}
                </h5>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Go</a>
            </div>
        </div>
    </div>
</div>
@endsection