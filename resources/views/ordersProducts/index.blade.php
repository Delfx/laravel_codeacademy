@extends('layouts.shop')

@section('content')
    <h1>
        Orders:
    </h1>
    <div class="container">
        <h5>
            <ol>
                @foreach ($productNames as $productName)
                        <li class="mt-4">
                            <h3 class="">
                                {{$productName['productName'][0]->name}}
                                {{-- {{dd($productName['orderProductId'])}} --}}
                            </h3>

                            <a class="link-dark " href="{{ route('deleteOrderProduct', $productName['orderProductId']) }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </li>
                @endforeach
            </ol>
        </h5>
    </div>
@endsection
