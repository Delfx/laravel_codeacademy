@extends('layouts.shop')

@section('content')
    @include('partials.form')

    @foreach ($products as $product)
        <div class="mt-5">

            <h5 class="m-0">
                Product name:
            </h5>
            <h1 class="m-0">
                {{ $product->name }}
            </h1>

            <h5 class="mt-2">
                Price: {{ $product->price }}
            </h5>
            <a class="link-dark text-decoration-none" href="{{ route('productView', $product->id) }}">
                <button class="btn btn-primary">View</button>
            </a>

            <a class="link-dark text-decoration-none" href="{{ route('edit', $product->id) }}">
                <button class="btn btn-info">Edit</button>
            </a>

            <a class="link-dark text-decoration-none" href="{{ route('store', $product->id) }}">
                <button class="btn btn-secondary">Add to Order</button>
            </a>

            <a class="link-dark text-decoration-none" href="{{route ('deleteProduct', $product->id)}}">
                <button class="btn btn-danger">Delete</button>
            </a>
        </div>
    @endforeach
@endsection
