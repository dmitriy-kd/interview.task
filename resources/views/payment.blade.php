@extends('master')

@section('content')
    <div class="position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Payment order
            </div>
        </div>

        <h4 style="margin-left: 204px;">To pay - {{ $sum }}</h4>
        <hr>

        @error('cardNumber')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="pay-form">
            <form method="POST" action="{{ route('order') }}">
                <div class="form-group">
                    <label for="cardNumber">Card Number</label>
                    <input type="text" class="form-control" id="cardNumber"
                           placeholder="Card Number" name="cardNumber" maxlength="16">
                </div>
                <div class="form-group">
                    <label for="expire">Expire</label>
                    <input type="text" class="form-control" id="expire"
                           placeholder="MM/YY" name="expire" maxlength="5">
                </div>
                <div class="form-group">
                    <label for="cvc">CVC</label>
                    <input type="password" class="form-control" id="cvc"
                           name="cvc" maxlength="3">
                </div>
                <div class="form-group">
                    <label for="cardHolder">Card Holder</label>
                    <input type="text" class="form-control" id="cardHolder"
                           placeholder="Card Holder Name" name="cardHolder">
                </div>
                <button type="submit" class="btn btn-primary" data-type="buy-btn">Submit</button>
                <input type="hidden" name="order_id" value="{{ $order_id }}">
                @csrf
            </form>
        </div>
    </div>
@endsection
