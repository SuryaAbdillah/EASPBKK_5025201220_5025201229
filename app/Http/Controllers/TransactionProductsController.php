<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class TransactionProductsController extends Controller
{
    public function index()
    {
        $transaksis = Transaction::all();
        return view('transaksi.index', compact('transaksis'));
    }

    public function show(string $id)
    {
        $transaksi = Transaction::findOrFail($id);
        $vouchers = Voucher::all();
        return view('transaksi.show', compact('transaksi', 'vouchers'));
    }
    
    public function create()
    {
        $products = Product::all();
        return view('transaksi.create', compact('products'));
    }
    
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        DB::table('transactions')->insert([
            'user_id' => $user_id,
            'nominal_pembayaran' => $request->input('nominal'),
            'jenis_pembayaran' => $request->input('jenis'),
        ]);
        
        $trans = Transaction::latest('tanggal')->first();
        
        $selectedProducts = $request->input('products');
        foreach ($selectedProducts as $productID => $data) {
            $quantity = $data['quantity'];
            if($quantity >0){
                DB::table('transactions_products')->insert([
                    'transaction_id' => $trans->id,
                    'product_id' => $productID,
                    'jumlah' => $quantity,
                ]);
            }
        }
        return redirect()->route('transaksi')->with('success', 'Product added successfully');
    }
    
    public function pdf(string $id)
    {
        ini_set('max_execution_time', 120);
        $user_id = Auth::user()->id;
        $transaksi = Transaction::findOrFail($id);
        $vouchers = Voucher::all();
        
        $pdf = PDF::loadView('transaksi.pdf', compact('transaksi', 'vouchers', 'user_id'));
        return $pdf->download('struk.pdf');
        // return view('transaksi.pdf', compact('transaksi', 'vouchers', 'user_id'));
    }
}