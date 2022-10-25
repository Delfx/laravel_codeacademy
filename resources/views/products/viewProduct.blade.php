@extends('layouts.shop')

@section('content')
    <h5 class="m-0 p-0">
        Product name:
    </h5>
    <h1 class="m-0 p-0">
        {{ $product->name }}
    </h1>
    <div class="mt-3">
        <h5>
            Description:
        </h5>
        <h3>
            {{ $product->description }}
        </h3>
    </div>

    <a class="btn btn-primary mt-3  " href="{{ route('edit', $product->id) }}">Edit</a>

@endsection
