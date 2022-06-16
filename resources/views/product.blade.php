@extends('layouts.master')

@section('product-content')
<main>
<div class="container" style="margin-top:20px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row">
        <h2 style="color:#000;">Manage Products</h2>
    </div>
    <div class="add-button">
        <a href="{{ route('product.create') }}" class="col-sm-2 btn btn-success">Add New </a>
    </div>
</div>


<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>

    <section>
        <div class="container">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Main Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Playlength</th>
                        <th width="100px">Action</th>
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
        ajax: "{{ route('product.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'main_name', name: 'main_name'},
            {data: 'image', name: 'image'},
            {data: 'price', name: 'price'},
            {data: 'playlength', name: 'playlength'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
@endsection
@endsection

