@extends('layouts.app')

@section('content')
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
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
