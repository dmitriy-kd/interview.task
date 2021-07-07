@extends('master')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Table of products
            </div>

            <div class="container">
                <div class="row">
                    <div class="col font-weight-bold">
                        Name
                    </div>
                    <div class="col font-weight-bold">
                        Brand
                    </div>
                    <div class="col font-weight-bold">
                        Price
                    </div>
                    <div class="col"></div>
                </div>
                <hr>
                @foreach($products as $product)
                    <div class="row">
                        <div class="col">
                            {{ $product->name }}
                        </div>
                        <div class="col">
                            {{ $product->brand->name }}
                        </div>
                        <div class="col">
                            {{ $product->price }}
                        </div>
                        <div class="col">
                            <a href="{{ route('checkout', [$product->id]) }}" class="btn btn-primary">Buy now</a>
                        </div>
                    </div>
                    <hr>
                @endforeach

            </div>

        </div>
    </div>
@endsection
