@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Size List</h1>
    <a href="{{ route('sizes.create') }}" class="btn btn-primary mb-3">Add Size</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price Multiplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sizes as $size)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $size->name }}</td>
                    <td>{{ $size->price_multiplier }}</td>
                    <td>
                        <a href="{{ route('sizes.edit', $size->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sizes.destroy', $size->id) }}" method="POST" class="d-inline">
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
