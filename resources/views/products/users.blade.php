@extends('layouts.shop')

@section('content')
    @foreach ($users as $user)
        <h1>
            {{ $user->name }}
        </h1>
    @endforeach
@endsection
