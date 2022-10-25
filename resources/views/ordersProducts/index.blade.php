@extends('layouts.shop')

@section('content')
    <h1>
        Orders:
    </h1>
    <h5>
        <ol>
            @foreach ($productNames as $productName)
             <li>   {{ $productName[0]->name }}</li>
            @endforeach
        </ol>
    </h5>
@endsection
