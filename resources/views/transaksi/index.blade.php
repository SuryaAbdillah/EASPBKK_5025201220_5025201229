@extends('layouts.app')
  
@section('title', 'Home Transaksi')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Transaksi</h1>
        <a href="{{ route('transaksis.create') }}" class="btn btn-primary">Add Transaksi</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Kode Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Macam Produk</th>
            </tr>
        </thead>
        <tbody>
            @if($transaksis->count() > 0)
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $transaksi->id }}</td>
                        <td class="align-middle">{{ $transaksi->tanggal }}</td>
                        <td class="align-middle">{{ $transaksi->jenis_pembayaran }}</td>
                        <td class="align-middle">
                            <ul>
                                @foreach($transaksi->products as $product)
                                <li>{{ $product->name }} {{ $product->transactions_products->jumlah }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('transaksis.show', $transaksi->id) }}" type="button" class="btn btn-secondary">Detail</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">transaksi not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection