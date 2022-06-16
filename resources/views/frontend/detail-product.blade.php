@extends('frontend.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection
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

<div class="col-sm-12 col-md-12 col-lg-12 bg-light">
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
                                <!-- <img src="https://via.placeholder.com/700x400/FFB6C1/000000" class="img-responsive" alt="product-image" /> -->
                                <img src="{{ $product->image }}" alt="">
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
                        <a href="{{ route('buynow', $product->id) }}" class="btn btn-success">Buy Now (Rs.{{ $product->price}})</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product -->
</div>
</section>

<section>
<div class="container" style="margin-top:20px;">
    <h4 class="fw-light text-center">Related Products</h4>
</div>

<!--Section: Block Content-->
<section style="border-bottom:1px solid #c5c5c5; ">
    <!-- Grid row -->
    <div class="row">
        @foreach($relatedProducts as $related)
        <!-- Grid column -->
        <div class="col-md-6 col-lg-3 bg-light">
            <!-- Card -->
            <div class="view zoom overlay z-depth-2 rounded">
                <img class="img-fluid w-100" src="{{ $related->image }}" alt="Sample">
                <a href="#!">
                </a>
            </div>

            <div class="pt-4" style="color:#000; text-align:center;">
                <h5>{!! \Illuminate\Support\Str::words($related->title, 3,'....')  !!}</h5>
                <h6>Rs. {{ $related->price }}</h6>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('product.detail', $related->id) }}">View Product</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Grid column -->
        @endforeach
    </div>
    <!-- Grid row -->

</section>
<!--Section: Block Content-->

<!-- Banners section start -->
<section>
    <div class="row bg-light">
      <div class="col book-banner">
        <img src="{{ asset('banner/banner3.jpg') }}" alt="">
      </div>
      <div class="col book-banner">
        <img src="{{ asset('banner/banner5.jpg') }}" alt="">
      </div>
    </div>
  </section>
 <!-- Banners section end -->

@endsection