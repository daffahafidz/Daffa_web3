<?php

namespace App\Http\Controllers;

use App\Models\Pancake;
use Illuminate\Http\Request;

class PancakeController extends Controller
{
    public function index()
    {
        $pancakes = Pancake::all();
        return view('pancakes.index', compact('pancakes'));
    }

    public function create()
    {
        return view('pancakes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'base_price' => 'required|numeric',
        ]);

        Pancake::create($request->all());
        return redirect()->route('pancakes.index')->with('success', 'Pancake created successfully.');
    }

    public function edit(Pancake $pancake)
    {
        return view('pancakes.edit', compact('pancake'));
    }

    public function update(Request $request, Pancake $pancake)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'base_price' => 'required|numeric',
        ]);

        $pancake->update($request->all());
        return redirect()->route('pancakes.index')->with('success', 'Pancake updated successfully.');
    }

    public function destroy(Pancake $pancake)
    {
        $pancake->delete();
        return redirect()->route('pancakes.index')->with('success', 'Pancake deleted successfully.');
    }
}
