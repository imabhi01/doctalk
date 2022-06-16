@extends('frontend.master')

@section('content')
<main>
<div class="container" style="margin-top:20px;">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color:#fff;">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color:#fff;">All Orders</li>
      </ol>
  </nav>
</div>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>

    <section>
        <div class="col-sm-12 col-md-12 col-lg-12 bg-light">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Total Payment</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>
</main>

@section('scripts')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.orders') }}", 
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'product', name: 'product'},
            {data: 'price', name: 'price'},
        ]
    });
    
  });
</script>
@endsection
@endsection

