<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $detail_user = UserDetail::where('user_detail.id_user', $user->id)->first();
        $carts = Cart::select(
            'product.id' ,'product_pict.name as picture_name', 
            'product.name as product_name', 'product.price', 'product.stock', 
            'product_type.type', 'cart.qty', 'cart.id_product_type', 'cart.id_user')
        ->join('product_type', 'product_type.id', '=' , 'cart.id_product_type' )
        ->join('product', 'product.id', '=' , 'product_type.id_product' )
        ->join('product_pict', 'product_pict.id_product', '=', 'product.id')
        ->where('product_pict.status', '1')
        ->where('cart.id_user', $user->id)
        ->get();


        // hitung total
        foreach ($carts as $item) {
            $qty[] = $item->qty;
            $price[] = $item->price;
        }
        $total = [];
        for ($i=0; $i < $carts->count(); $i++) { 
            $total[] = intval($price[$i]) * intval($qty[$i]);
        }
        $result=0;
        for ($i=0; $i < $carts->count() ; $i++) { 
            $result += $total[$i];
        }

        // potongan
        // if ($result > 50000) {
        //     $discount = 10000;
        // }else if($result % 100000 == 0){
        //     $discount = 5000; 
        // }elseif($result > 50000 && $result % 100000 == 0){
        //     $discount = 15000;
        // }else{
        //     $discount = 0;
        // }

        //potongan
        $discount = 0;
        $voucher_req = $request->voucher;
        $vouchers = Voucher::where('status', 'active')->get();
        
        if ($voucher_req != null) {
            foreach ($vouchers as $item) {
                if ($item->voucher_code == $voucher_req) {
                    $data = Voucher::find($item->id);
                    $data->status = 'inactive';
                    $data->save();
                    $discount = $item->discount;
                }
            }
        }
        
        $harus_bayar = $result - $discount;

        // dd($harus_bayar);
        return view('user.order', compact('detail_user', 'carts', 'result', 'harus_bayar', 'discount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_date' => 'required',
            'total' => 'required',
            // 'id_product_type' =>'required',
            'id_user' => 'required',
            // 'product_qty' => 'required',
            'method' => 'required'
        ]);

        $cart = $request->cart_id;
        $result = $request->result;
        // potongan
        // if ($result > 50000) {
        //     $discount = 10000;
        // }else if($result % 100000 == 0){
        //     $discount = 5000; 
        // }elseif($result > 50000 && $result % 100000 == 0){
        //     $discount = 15000;
        // }else{
        //     $discount = 0;
        // }
        
        //insert ke tabel order
        $data = new Order();
        $data->order_date = $request->order_date;
        $data->order_time = $request->order_time;
        $data->discount = $request->discount;
        $data->total = $request->total;
        $data->status = 'open';
        $data->id_user = $request->id_user;

        $masuk = $data->save();

        
        if($masuk){
            //pindah
            $cart_data = Cart::join('product_type', 'product_type.id', '=', 'cart.id_product_type')
            ->where('cart.id_user', $request->id_user)->get();
            foreach ($cart_data as $item) {
                $id_product_type[] = $item->id_product_type;
                $qty[] = $item->qty;
            }

            $total_qty=0;
            for ($i=0; $i < $cart_data->count(); $i++) { 
            $pindah = new OrderDetail;
            $pindah->id_order = $data->id;
            $pindah->id_product_type = $id_product_type[$i];
            $pindah->qty = $qty[$i];
            $insert=$pindah->save();

            $update_stock = ProductType::find($id_product_type[$i]);
            $update_stock->stock = $update_stock->stock - $qty[$i];
            $update=$update_stock->save();

            $total_qty += $qty[$i];
            }

            $stock_product = Product::find($request->product_id);
            $stock_product->stock = $stock_product->stock - $total_qty;
            $update1=$stock_product->save();


            if($insert && $update && $update1){
                //hapus, barang sudah di pesan
                $delete = Cart::where('cart.id_user', $request->id_user)->delete();
                if($delete){
                    return redirect()->route('history.index')->with('success', 'Berhasil menambah pesanan!');
                }else{
                    return redirect()->route('cart.index')->with('error', 'Gagal Tambah Pesanan');
                }
            }else{
            return back()->with('error', 'Gagal Dhin');
            }
        }
        
        return back()->with('error', 'Gagal Tambah Pesanan');
    }
}
