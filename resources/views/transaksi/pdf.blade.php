<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Transaksi {{ $transaksi->id }}</title>
    <style>
      .clearfix:after {
        content: "";
        display: table;
        clear: both;
      }
      
      a {
        color: #5D6975;
        text-decoration: underline;
      }
      
      body {
        position: relative;
        width:  100%;  
        margin: 0 auto; 
        color: #001028;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 12px; 
        font-family: Arial;
      }
      
      header {
        padding: 10px 0;
        margin-bottom: 30px;
      }
      
      #logo {
        text-align: center;
        margin-bottom: 10px;
      }
      
      #logo img {
        width: 90px;
      }
      
      h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
      }
      
      #project {
        float: left;
      }
      
      #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
      }
      
      #company {
        float: right;
        text-align: right;
      }
      
      #project div,
      #company div {
        white-space: nowrap;        
      }
      
      table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
      }
      
      table tr:nth-child(2n-1) td {
        background: #F5F5F5;
      }
      
      table th,
      table td {
        text-align: center;
      }
      
      table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;        
        font-weight: normal;
      }
      
      table .service,
      table .desc {
        text-align: left;
      }
      
      table td {
        padding: 20px;
        text-align: right;
      }
      
      table td.service,
      table td.desc {
        vertical-align: top;
      }
      
      table td.unit,
      table td.qty,
      table td.total {
        font-size: 1.2em;
      }
      
      table td.grand {
        border-top: 1px solid #5D6975;;
      }
      
      #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
      }
      
      footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
      }
    </style>
  </head>
  <body>
    @php
    $totalBelanja = 0;
    $totalDiskon = 0;
    @endphp
    <header class="clearfix">
      <h1>ALFAMART ITS</h1>
      <h2>Jl. Teknik Kimia ITS</h2>
      <div id="company" class="clearfix">
        <div>{{ $user_id }}</div>
      </div>
      <div id="project">
        <div><span>Tanggal</span> {{ $transaksi->tanggal }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">ITEM</th>
            <th class="desc">JUMLAH</th>
            <th>HARGA</th>
            <th>DISKON</th>
            <th>TOTAL HARGA</th>
          </tr>
        </thead>
        <tbody>
        @foreach($transaksi->products as $product)
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
          <tr>
            <td class="service">{{ $product->name }}</td>
            <td class="desc">{{ $product->transactions_products->jumlah }}</td>
            <td class="unit">{{ $product->price }}</td>
            <td class="qty">{{ $discount * 0.01 }}</td>
            <td class="total">{{ $totalHarga }}</td>
          </tr>
        @endforeach
        
          <tr>
            <td colspan="4">Total Belanja</td>
            <td class="total">{{ $totalBelanja }}</td>
          </tr>
          <tr>
            <td colspan="4">PPN 10%</td>
            <td class="total">{{ $totalBelanja * 0.1 }}</td>
          </tr>
          <tr>
            <td colspan="4">Total Diskon</td>
            <td class="total">{{ $totalDiskon }}</td>
          </tr>
          <tr>
            <td colspan="4">Nominal Pembayaran</td>
            <td class="total">{{ $transaksi->nominal_pembayaran }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{ $totalBelanja + $totalBelanja * 0.1 - $totalDiskon }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">Kembalian</td>
            <td class="grand total">{{ $transaksi->nominal_pembayaran - $totalBelanja - $totalBelanja * 0.1 + $totalDiskon }}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>CUSTOMER SERVICE:</div>
        <div class="notice">0812344566778</div>
        <div class="notice">ALFA@MART.COM</div>
      </div>
    </main>
    <footer>
      PT. ALFAMART <br>GEDUNG MAJU DIKIT <br>SURABAYA TIMUR
    </footer>
  </body>
</html>