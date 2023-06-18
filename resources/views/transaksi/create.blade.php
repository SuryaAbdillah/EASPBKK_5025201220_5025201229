@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Transaksi</h1>
    <hr />
    <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <hr>
        <h3>Produk</h3>
        @foreach($products as $product)
            <div class="row mb-3">
                <label class="form-label ml-4" for="product_{{ $product->id }}">{{ $product->name }}</label>
                <input type="text" name="products[{{ $product->id }}][quantity]" class="form-control" placeholder="Jumlah Produk">
            </div>
        @endforeach
        
        <hr>
        <h3>Pembayaran</h3>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nominal" class="form-control" placeholder="Nominal Pembayaran">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="jenis" class="form-control" placeholder="Jenis Pembayaran">
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection