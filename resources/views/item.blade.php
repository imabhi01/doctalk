@extends('layouts.master')

@section('product-item')
<div class="container" style="margin-top:20px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
        </ol>
    </nav>
</div>

<div class="container">
<div class="product-item-content">
    @if (isset($getProduct)) 
        <div class="card-product">
            <p class="card-title" id="item-type">{{$getProduct->type}}</p>
            <div class="view-product">
                <div class="product-info">
                    <input type="text" id="title" name="title" placeholder="Title" value="{{$getProduct->title}}">
                    <input type="text" id="first_name" name="first_name" placeholder="Firstname (Optional)" value="{{$getProduct->first_name}}">
                    <input type="text" id="main_name" name="main_name" placeholder="Surname / Band Name" value="{{$getProduct->main_name}}">
                    <input type="text" id="price" name="price" placeholder="Price" value="{{$getProduct->price}}">
                    @if ($getProduct->type == "CD")
                        <input type="text" id="playlength" name="playlength" placeholder="Pages / Playlength" value="{{$getProduct->playlength}}">
                    @endif
                    @if ($getProduct->type == "BOOK")
                        <input type="text" id="playlength" name="playlength" placeholder="Pages / Playlength" value="{{$getProduct->playlength}}">
                    @endif
                </div>
                <div class="product-action">
                    <button class="delete-product" value="{{$getProduct->id}}">Delete</select>
                    <button class="update-product" value="{{$getProduct->id}}">Update</select>
                </div>
            </div>
        </div>
    @else
        <div class="add-product">
            <div class="card-product">
                <p class="">Product Type: 
                    <select id="producttype" name="producttype">
                        <option value="cd">CD</option>
                        <option value="book">Book</option>
                    </select>
                </p>
                <div class="view-product">
                    <div class="product-info">
                        <input type="text" id="title" name="title" placeholder="Title">
                        <input type="text" id="first_name" name="first_name" placeholder="Firstname (Optional)">
                        <input type="text" id="main_name" name="main_name" placeholder="Surname / Band Name">
                        <input type="text" id="playlength" name="playlength" placeholder="Pages / Playlength">
                        <input type="text" id="price" name="price" placeholder="Price">
                    </div>
                    <div class="product-action">
                        <button class="add-product">Add New </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
</div>
@endsection

