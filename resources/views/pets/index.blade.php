@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>List of pets</h1>
    <nav>
        <ul>
            <li><a href="{{ route('pets.create') }}">Add New Pet</a></li>
        </ul>
    </nav>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pets as $pet)
            <tr>
                <td>{{ $pet['name'] }}</td>
                <td>
                    <a href="{{ route('pets.show', $pet['id']) }}">Details</a>
                    <a href="{{ route('pets.edit', $pet['id']) }}">Edit</a>
                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this pet?')) document.getElementById('delete-form-{{ $pet['id'] }}').submit();">Delete</a>
                    <form id="delete-form-{{ $pet['id'] }}" action="{{ route('pets.destroy', $pet['id']) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
