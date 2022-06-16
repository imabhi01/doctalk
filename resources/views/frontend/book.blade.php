@extends('frontend.master')

@section('styles')
  <style>
    svg {
      vertical-align: middle;
      width: 20px;
    }
  </style>
@endsection

@section('content')
<main>
<div class="container" style="margin-top:20px;">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Book Products Page</li>
      </ol>
  </nav>
</div>

<div class="album py-4 bg-light">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 g-3 mb-4">
      @forelse($bookProducts as $book)
      <div class="col">
        <div class="card shadow-sm">
          <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="50" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
          <img src="{{ $book->image }}" alt="">
          <div class="card-body">
            <p class="card-text">{!! \Illuminate\Support\Str::words($book->title, 5,'....')  !!}</p>
            <p class="card-text">{{ $book->first_name }} {{ $book->main_name }}</p>
            <p class="card-text">Rs.{{ $book->price }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('product.detail', $book->id) }}">View Product</a>
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
            <p>No products in CD</p>
          </div>
        </div>
      </div>
      @endforelse
    </div>
  </div>
  {{ $bookProducts->links() }}
</div>
</main>
@endsection