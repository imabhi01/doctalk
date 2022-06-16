@extends('layouts.master')
@section('product-content')

<div class="container" style="margin-top:20px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Page</li>
        </ol>
    </nav>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="item active">
                                <img src="https://via.placeholder.com/700x400/FFB6C1/000000" class="img-responsive" alt="product-image" />
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                        <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="name">
                    <strong>Product Name </strong>{{ $product->title }}
                    <small style="font-size:20px;">Author {{ $product->first_name }} {{ $product->main_name }}</small>
                </h2>
                <hr />
                <h3 class="price-container">
                    Rs.{{ $product->price }}
                </h3>
               
                <hr />
                <div class="description description-tabs">
                    <div class="description">
                        <div class="" id="more-information">
                            <br />
                            <strong>Description Title</strong>
                            <p>
                               {{ $product->title }}
                            </p>
                            <strong>@if($product->type == 'BOOK') Number of pages @elseif($product->type == 'CD') Duration @endif</strong>
                            <p>
                                {{ $product->playlength }}
                            </p>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <a href="{{ route('buynow', $product->id) }}" class="btn btn-success btn-lg">Buy Now (Rs.{{ $product->price}})</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product -->
</div>

@endsection