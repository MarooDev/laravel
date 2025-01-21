@extends('layouts.app')

@section('content')
    <h1>List of pets</h1>
    <nav>
        <ul>
            <li><a href="{{ route('pets.index') }}">List of Pets</a></li>
            <li><a href="{{ route('pets.create') }}">Add New Pet</a></li>
        </ul>
    </nav>
    <ul>
        @foreach($pets as $pet)
            <li>{{ isset($pet['name']) ? $pet['name'] : 'No name' }} - <a href="{{ route('pets.show', $pet['id']) }}">Details</a></li>
        @endforeach
    </ul>
@endsection
