@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Description" >{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Brand</label>
                <input type="text" name="brand" class="form-control" placeholder="Brand" value="{{ $product->brand }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $product->category }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price (Rp.)" value="{{ $product->price }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Stock</label>
                <input type="text" name="stock" class="form-control" placeholder="Stock" value="{{ $product->stock }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Supplier</label>
                <input type="text" name="supplier" class="form-control" placeholder="Supplier" value="{{ $product->supplier }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection