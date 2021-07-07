@extends('master')

@section('content')
    <div class="position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Checkout
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col font-weight-bold">
                    <h4>Product info</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1 font-weight-bold">
                    Name
                </div>
                <div class="col-sm-1 font-weight-bold">
                    Price
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1">
                    {{ $product->name }}
                </div>
                <div class="col-sm-1">
                    {{ $product->price }}
                </div>
            </div>
        </div>

        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="checkout-form">

            <form method="POST" action="{{ route('payment') }}">
                <h4>Order info</h4>
                <div class="form-group">
                    <label for="client_name">Name</label>
                    <input type="text" class="form-control" id="client_name"
                           placeholder="Enter your name" name="client_name">
                </div>
                <div class="form-group">
                    <label for="client_address">Address</label>
                    <input type="text" class="form-control" id="client_address"
                           placeholder="Enter your address" name="client_address">
                </div>
                <div class="form-group">
                    <label for="total_product_value">Count</label>
                    <input type="number" class="form-control" id="total_product_value"
                           value="1" name="total_product_value">
                </div>
                <div class="form-group">
                    <label for="total_shipping_value">Delivery</label>
                    <select class="form-control" id="total_shipping_value" name="total_shipping_value">
                        <option value="0">Standard *free</option>
                        <option value="10">Express *10 EUR</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" data-type="buy-btn">Submit</button>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                @csrf
            </form>
        </div>

    </div>

@endsection
