@extends('layouts.app')
  
@section('title', 'Show Product')
  
@section('contents')
    <h1 class="mb-0">Detail Product</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $product->description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Brand</label>
            <input type="text" name="brand" class="form-control" placeholder="Brand" value="{{ $product->brand }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $product->category }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Stock</label>
            <input type="text" name="stock" class="form-control" placeholder="Stock" value="{{ $product->stock }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Supplier</label>
            <input type="text" name="supplier" class="form-control" placeholder="Product Supplier" value="{{ $product->supplier }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product->updated_at }}" readonly>
        </div>
    </div>
@endsection