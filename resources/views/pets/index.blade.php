@extends('layouts.app')

@section('content')
    <h1>List of pets</h1>
    <ul>
        @foreach($pets as $pet)
            <li>{{ isset($pet['name']) ? $pet['name'] : 'No name' }} - <a href="{{ route('pets.show', $pet['id']) }}">Details</a></li>
        @endforeach
    </ul>
@endsection
