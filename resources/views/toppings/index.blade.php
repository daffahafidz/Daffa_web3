@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Topping List</h1>
    <a href="{{ route('toppings.create') }}" class="btn btn-primary mb-3">Add Topping</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($toppings as $topping)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $topping->name }}</td>
                    <td>${{ number_format($topping->price, 2) }}</td>
                    <td>
                        <a href="{{ route('toppings.edit', $topping->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('toppings.destroy', $topping->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
