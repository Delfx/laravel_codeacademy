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
        </div>
    @endforeach
@endsection
