<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Pancake;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('pancakes', 'customer')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $pancakes = Pancake::all();
        return view('sales.create', compact('customers', 'pancakes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'pancakes' => 'required|array',
            'pancakes.*.id' => 'exists:pancakes,id',
            'pancakes.*.quantity' => 'required|integer|min:1',
        ]);

        $sale = Sale::create([
            'customer_id' => $request->customer_id,
            'total_price' => 0, // Placeholder, will be calculated
        ]);

        $totalPrice = 0;

        foreach ($request->pancakes as $pancake) {
            $pancakeModel = Pancake::find($pancake['id']);
            $sale->pancakes()->attach($pancake['id'], ['quantity' => $pancake['quantity']]);
            $totalPrice += $pancakeModel->base_price * $pancake['quantity'];
        }

        $sale->update(['total_price' => $totalPrice]);

        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function show(Sale $sale)
    {
        $sale->load('pancakes', 'customer');
        return view('sales.show', compact('sale'));
    }
}
