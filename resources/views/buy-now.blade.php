@extends('frontend.master')
@section('content')
<section>
<div class="container" style="margin-top:20px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Page</li>
        </ol>
    </nav>
</div>
<div class="row">
    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
</div>

<div class="col-sm-12 col-md-12 col-lg-12 bg-light py-5" style="color:#000;">
    <div class="row">
        <div class="col-md-4 ">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <p>Your Product</p>
            <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">{{ $product->title }}</small>
                </div>
                <span class="text-muted">Rs.{{ $product->price }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <span>Total</span>
                <strong>Rs.{{ $product->price }}</strong>
            </li>
            </ul>
        </div>

        <div class="col-md-8">
            <h4 class="mb-3">Billing address</h4>
            <form accept-charset="UTF-8" action="{{ route('stripe.post') }}" class="require-validation" data-cc-on-file="false"
                data-stripe-publishable-key="{{ config('services.stripe.key')}}" id="payment-form" method="post">
                {{ csrf_field() }}
                <h4 class="mb-3">Payment</h4>

                <div class='row'>
                    
                    <div class='col-md-12 form-group required'>
                        <label class='control-label'>Name on Card</label> 
                        <input class='form-control' size='4' type='text' name="name">
                    </div>
                
                    <div class='col-md-12 form-group required'>
                        <label class='control-label'>Card Number</label> 
                        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                    </div>
                    <div class='col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label> 
                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                            type='text'>
                    </div>
                    <div class='col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration</label> 
                        <input class='form-control card-expiry-month' placeholder='MM' size='2'
                            type='text'>
                    </div>
                    <div class='col-md-4 form-group expiration required'>
                        <label class='control-label'> </label> <input
                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                            type='text'>
                    </div>

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class='form-row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control btn btn-primary submit-button'
                            type='submit' style="margin-top: 10px;">Pay Rs.{{ $product->price }}</button>
                    </div>
                </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection