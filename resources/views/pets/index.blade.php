@extends('layouts.app')

@section('content')
    <h1>Lista zwierząt</h1>
    <ul>
        @foreach($pets as $pet)
            <li>{{ isset($pet['name']) ? $pet['name'] : 'Brak nazwy' }} - <a href="{{ route('pets.show', $pet['id']) }}">Szczegóły</a></li>
        @endforeach
    </ul>
@endsection
