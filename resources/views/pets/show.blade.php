@extends('layouts.app')

@section('content')
    <h1>Details of pets</h1>
    <ul>
        <li><strong>ID:</strong> {{ $pet['id'] }}</li>
        <li><strong>Name:</strong> {{ $pet['name'] }}</li>
        <li><strong>Status:</strong> {{ $pet['status'] }}</li>
    </ul>
    <a href="{{ route('pets.index') }}">Return to list</a>
@endsection

