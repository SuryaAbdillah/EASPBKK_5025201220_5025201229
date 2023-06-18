@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr />
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Product Name">
            </div>
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="brand" class="form-control" placeholder="Brand">
            </div>
            <div class="col">
                <input type="text" name="category" class="form-control" placeholder="Category">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price (Rp.)">
            </div>
            <div class="col">
                <input type="text" name="stock" class="form-control" placeholder="Stock">
            </div>
            <div class="col">
                <input type="text" name="supplier" class="form-control" placeholder="Supplier ID">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection