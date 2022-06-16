@extends('layouts.master')
  
@section('product-content')
<main>
    <div class="box">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-sm-6">
                <label class="col-sm-2" for="">Type</label>
                <select name="type" id="type" placeholder="Select Product Type" class="form-control">
                    <option value="" Selected disabled>Select Product Type</option>
                    <option value="CD">CD</option>
                    <option value="BOOK">BOOK</option>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-2" for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-2" for="exampleInputPassword1">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-2" for="exampleInputPassword1">Main Name</label>
                <input type="text" class="form-control" name="main_name" id="main_name" placeholder="Main Name">
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-2" for="exampleInputPassword1">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Price">
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-2" for="exampleInputPassword1">PlayLength / Pages</label>
                <input type="number" class="form-control" name="playlength" id="playlength" placeholder="Playlength">
            </div>
            <div class="form-group col-sm-6">
                <label class="col-sm-2" for="exampleInputPassword1">PlayLength / Pages</label>
                <div class="row">
                <input type="file" name="image">
                </div>
            </div>
            <div class="submit" style="margin-top:10px;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</main>
@endsection