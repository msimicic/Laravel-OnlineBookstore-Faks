<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $orders = Order::all();
        $orders = Order::paginate(5);
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orderDate' => 'required|date',
            'totalPrice' => 'required|numeric',
            'customerId' => 'required|exists:customers,id',
        ]);

        Order::create([
            'order_date' => $request->input('orderDate'),
            'total_price' => $request->input('totalPrice'),
            'customer_id' => $request->input('customerId'),
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('orders.edit', ['order' => $order, 'customers' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'orderDate' => 'nullable|date',
            'totalPrice' => 'nullable|numeric',
        ]);

        if ($request->filled('orderDate')) {
            $order->order_date = $request->input('orderDate');
        }
        if ($request->filled('totalPrice')) {
            $order->total_price = $request->input('totalPrice');
        }
        
        $order->customer_id = $request->input('customerId');

        $order->save();

        return back()->with('success', 'Order edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
