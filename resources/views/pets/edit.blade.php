@extends('layouts.app')

@section('content')
    <h1>Edit Pet</h1>
    <form method="POST" action="{{ route('pets.update', $pet['id']) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $pet['name'] }}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="available" {{ $pet['status'] == 'available' ? 'selected' : '' }}>Available</option>
                <option value="pending" {{ $pet['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="sold" {{ $pet['status'] == 'sold' ? 'selected' : '' }}>Sold</option>
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
