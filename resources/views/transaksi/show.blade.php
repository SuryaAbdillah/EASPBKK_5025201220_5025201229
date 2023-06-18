@extends('layouts.app')
  
@section('title', 'Show Transaksi')
  
@section('contents')
    <h1 class="mb-0">Detail Product</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">ID Transaksi</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $transaksi->id }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Tanggal Transaksi</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $transaksi->tanggal }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">ID Karyawan</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $transaksi->user_id }}" readonly>
        </div>
    </div>
    <hr>
    @php
    $totalBelanja = 0;
    $totalDiskon = 0;
    @endphp
    @foreach($transaksi->products as $product)
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">ID Produk</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->id }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Harga Produk</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->price }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jumlah Produk</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->transactions_products->jumlah }}" readonly>
        </div>
        @php
        $totalHarga = $product->price * $product->transactions_products->jumlah; 
        $totalBelanja += $totalHarga;
        $discount = 0;
        foreach($vouchers as $voucher) {
            if($voucher->product_id == $product->id) {
                $discount = $voucher->jumlah_diskon * 0.01;
                $totalDiskon += $discount * $totalHarga;
            }
        }
        @endphp
        <div class="col mb-3">
            <label class="form-label">Diskon</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $discount }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Total Harga</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $totalHarga }}" readonly>
        </div>
    </div>
    @endforeach
    <hr>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total Belanja</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $totalBelanja }}" readonly>
        </div> 
        <div class="col mb-3">
            <label class="form-label">PPN</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $totalBelanja * 0.1 }}" readonly>
        </div> 
        <div class="col mb-3">
            <label class="form-label">Total Diskon</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $totalDiskon }}" readonly>
        </div> 
        <div class="col mb-3">
            <label class="form-label">Total Bayar</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $totalBelanja + $totalBelanja * 0.1 - $totalDiskon}}" readonly>
        </div> 
    </div>
    <hr>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nominal Bayar</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $transaksi->nominal_pembayaran }}" readonly>
        </div> 
        <div class="col mb-3">
            <label class="form-label">Kembalian</label>
            <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $transaksi->nominal_pembayaran - $totalBelanja - $totalBelanja * 0.1 + $totalDiskon }}" readonly>
        </div> 
    </div>
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ route('transaksi.pdf', $transaksi->id) }}" type="button" class="btn btn-secondary">Generate PDF</a>
    </div>
@endsection