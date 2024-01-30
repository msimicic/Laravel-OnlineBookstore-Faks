<?php
namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Publisher;
use App\Models\User;

class DashboardController extends Controller 
{
    public function index() 
    {
        $counters = [
            'authors' => Author::count(),
            'books' => Book::count(),
            'customers' => Customer::count(),
            'orders' => Order::count(),
            'publishers' => Publisher::count(),
            'users' => User::count(),
        ];
        return view('dashboard', ['counters' => $counters]);
    }
}