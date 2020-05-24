<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Transaction_Detail;
use App\Province;
use App\City;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
        $this->middleware(['auth:web']);
    }

    public function store(Request $request){
        $provinsi = Province::find($request->province);
        $kota = City::where('city_id','=',$request->regency)->first();
        $transaksi = new Transaction;
        date_default_timezone_set("Asia/Makassar");
        $transaksi->timeout = date('Y-m-d H:i:s', strtotime('+1 days'));
        $transaksi->address = $request->address;
        $transaksi->regency = $kota->title;
        $transaksi->province = $provinsi->title;
        $transaksi->total = $request->total;
        $transaksi->shipping_cost = $request->shipping_cost;
        $transaksi->sub_total = $request->sub_total;
        $transaksi->user_id = $request->user_id;
        $transaksi->courier_id = $request->courier;
        $transaksi->status = 'unverified';
        $transaksi->telp = $request->no_telp;
        $transaksi->save();

        if($request->product_id != 0){
            $detail_transaksi = new Transaction_Detail;
            $detail_transaksi->transaction_id = $transaksi->id;
            $detail_transaksi->product_id = $request->product_id;
            $detail_transaksi->qty = $request->qty;
            $produk = Product::with('discount')->find($request->product_id);
            if($produk->discount->count()){
                foreach($produk->discount as $diskon){
                    if($diskon->end > date('Y-m-d')){
                        $detail_transaksi->discount = $diskon->percentage;
                    }else{
                        $detail_transaksi->discount = 0;
                    }
                }
            }else{
                $detail_transaksi->discount = 0;
            }
            $detail_transaksi->selling_price = $produk->price;
            $detail_transaksi->save();
        }else{
            $cart = Cart::with(['product' => function($q){
                $q->with('product_image','discount');
            }])->where('user_id', '=', $request->user_id)->where('status', '=', 'notyet')->get();
    
            foreach($cart as $item){
                $detail_transaksi = new Transaction_Detail;
                $detail_transaksi->transaction_id = $transaksi->id;
                $detail_transaksi->product_id = $item->product->id;
                $detail_transaksi->qty = $item->qty;
                if($item->product->discount->count()){
                    foreach($item->product->discount as $diskon){
                        if($diskon->end > date('Y-m-d')){
                            $detail_transaksi->discount = $diskon->percentage;
                        }else{
                            $detail_transaksi->discount = 0;
                        }
                    }
                }else{
                    $detail_transaksi->discount = 0;
                }
                $detail_transaksi->selling_price = $item->product->price;
                $detail_transaksi->save();
    
                $item->status = 'checkedout';
                $item->save();
            }
        }

        return redirect('/transaksi/'.$request->user_id);
    }

    public function index($id){
        if(is_null(Auth::user())){
            return redirect('/login');
        }elseif(Auth::user()->id != $id){
            return abort(404);
        }else{
            $transaksi = Transaction::orderBy('id', 'DESC')->where('user_id','=',$id)->get();
            return view('user.transaksi', ['transaksi' => $transaksi]);
        }
    }

    public function adminIndex(){
        if(is_null(Auth::guard('admin')->user())){
            return redirect('/admin/login');
        }else{
            $transaksi = Transaction::all();
            return view('product.admintransaksi', ['transaksi' => $transaksi]);
        }
    }

    public function sort(Request $request){
        if($request->status == 'waiting'){
            $transaksi = Transaction::where('status','=','unverified')->whereNotNull('proof_of_payment')->get();
        }elseif($request->status == 'all'){
            $transaksi = Transaction::all();
        }else{
            $transaksi = Transaction::where('status', '=', $request->status)->get();
        }

        $hasil = view('product.adminfilter', ['transaksi' => $transaksi])->render();

        return response()->json(['success' => 'berhasil', 'hasil'=>$hasil]);
    }
}
