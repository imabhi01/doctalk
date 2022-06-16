@extends('frontend.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection
@section('content')
<main>
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/red_dead_redemption_6-wallpaper-1920x1080.jpg') }}" alt="sliders" width="100%">
      </div>
      <div class="carousel-item">
      <p>Title Goes here</p>
        <img src="{{ asset('images/gta-5.jpg') }}" alt="sliders" width="100%">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/ureal-engine-5.jpg') }}" alt="sliders" width="100%">
        <p>Title Goes here</p>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <section>
    <!-- <h1 class="fw-light text-center">Cd Product Listing</h1> -->
    <div class="items py-5 bg-light">
      @forelse($cdProducts as $cd)
        <div>
          <div class="card shadow-sm">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="50" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <img src="{{ $cd->image }}" alt="">
            <div class="card-body">
              <p class="card-text">{!! \Illuminate\Support\Str::words($cd->title, 3,'....')  !!}</p>
              <p class="card-text">{!! \Illuminate\Support\Str::words($cd->first_name  . ' '. $cd->main_name , 3,'....')  !!}</p>
              <p class="card-text">Rs.{{ $cd->price }}</p>
              <div class="d-flex justify-content-between align-items-left flex-fill">
                <div class="btn-group btn-block">
                  <a type="button" class="btn btn-sm btn-outline-primary " href="{{ route('product.detail', $cd->id) }}" style="width:100%">View Product</a>
                </div>
                <!-- <small class="text-muted">{{ $cd->playlength }} pages</small> -->
              </div>
            </div>
          </div>
        </div>
      @empty
      <div class="col">
        <div class="card shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

          <div class="card-body">
            <p>No products in CD</p>
          </div>
        </div>
      </div>
      @endforelse
    </div>
  </section>
  <section class="container container-banner my-4">
  <div class="col col-12 col-md-6 ml-4">
      <h2 class="py-4">The best bookstore <br>available in the market right now</h2>
      <a class="btn btn-outline-primary px-5" href="{{ route('book') }}" role="button">Explore More</a>
      </div>
  </section>


  <!-- Banners section start -->
  <!-- <section class="container-fluid">
    <div class="row bg-light">
      <div class="col book-banner col-12 col-md-6">
        <img class="img-fluid" src="{{ asset('banner/banner3.jpg') }}" alt="">
      </div>
      <div class="col book-banner col-12 col-md-6">
        <img class="img-fluid" src="{{ asset('banner/banner5.jpg') }}" alt="">
      </div>
    </div>
  </section> -->
 <!-- Banners section end -->
  <!-- Book Product Listing -->
  <section>
    <!-- <h1 class="fw-light text-center" style="margin-top:40px;">Book Product Listing</h1> -->
    <div class="items bg-light">
      @forelse($bookProducts as $book)
        <div>
          <div class="card shadow-sm">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="50" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
            <img src="{{ $book->image }}" alt="">
            <div class="card-body">
              <p class="card-text">{!! \Illuminate\Support\Str::words($book->title, 3,'....')  !!}</p>
              <p class="card-text">{!! \Illuminate\Support\Str::words($book->first_name  . ' '. $book->main_name , 3,'....')  !!}</p>
              <p class="card-text">Rs.{{ $book->price }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a type="button" class="btn btn-sm btn-outline-primary" href="{{ route('product.detail', $book->id) }}">View Product</a>
                </div>
                <!-- <small class="text-muted">{{ $book->playlength }} pages</small> -->
              </div>
            </div>
          </div>
        </div>
      @empty
      <div class="col">
        <div class="card shadow-sm">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

          <div class="card-body">
            <p>No products in Book</p>
          </div>
        </div>
      </div>
      @endforelse
    </div>
  </section>

  <section class="container-fluid">
    <div class="row bg-light">
      
      <div class="col book-banner col-12 col-md-12">
      <div>
        <h2>The Henry Cavill</h2>
        <p>Buy Best book from us</p>
      </div>
        <img class="img-fluid" src="{{ asset('banner/banner-book.jpg') }}" alt="">
      </div>
     
    </div>
  </section>
</main>
@endsection
