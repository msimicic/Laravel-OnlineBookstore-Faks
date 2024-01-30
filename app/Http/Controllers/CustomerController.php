<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $customers = Customer::all();
        $customers = Customer::paginate(5);
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:45',
            'lastName' => 'required|string|max:45',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'nullable|string|max:45',
        ]);

        Customer::create([
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phoneNumber'),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'firstName' => 'nullable|string|max:45',
            'lastName' => 'nullable|string|max:45',
            'address' => 'nullable|string|max:255',
            'phoneNumber' => 'nullable|string|max:45',
        ]);

        if ($request->filled('firstName')) {
            $customer->first_name = $request->input('firstName');
        }
        if ($request->filled('lastName')) {
            $customer->last_name = $request->input('lastName');
        }
        if ($request->filled('address')) {
            $customer->address = $request->input('address');
        }
        if ($request->filled('phoneNumber')) {
            $customer->phone_number = $request->input('phoneNumber');
        }

        $customer->save();

        return back()->with('success', 'Customer edited successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
