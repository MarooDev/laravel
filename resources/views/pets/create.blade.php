@extends('layouts.app')

@section('content')
    <h1>Add a New Pet</h1>
    <form method="POST" action="{{ route('pets.store') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="available">Available</option>
                <option value="pending">Pending</option>
                <option value="sold">Sold</option>
            </select>
        </div>
        <button type="submit">Add</button>
    </form>
@endsection
