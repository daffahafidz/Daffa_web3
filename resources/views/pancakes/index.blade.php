@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pancake List</h1>
    <a href="{{ route('pancakes.create') }}" class="btn btn-primary mb-3">Add Pancake</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Base Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pancakes as $pancake)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pancake->name }}</td>
                    <td>{{ $pancake->description }}</td>
                    <td>${{ number_format($pancake->base_price, 2) }}</td>
                    <td>
                        <a href="{{ route('pancakes.edit', $pancake->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pancakes.destroy', $pancake->id) }}" method="POST" class="d-inline">
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
