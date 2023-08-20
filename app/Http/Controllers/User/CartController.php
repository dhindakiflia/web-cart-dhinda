<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $carts = Cart::select(
            'product.id' ,'product_pict.name as picture_name', 
            'product.name as product_name', 'product.price', 'product.stock', 
            'product_type.type', 'cart.qty', 'cart.id_product_type', 'cart.id_user')
        ->join('product_type', 'product_type.id', '=' , 'cart.id_product_type' )
        ->join('product', 'product.id', '=' , 'product_type.id_product' )
        ->join('product_pict', 'product_pict.id_product', '=', 'product.id')
        ->where('product_pict.status', '1')
        ->where('cart.id_user', $user_id)
        ->simplePaginate(5);

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

        //product_type id
        foreach ($carts as $item) {
            $id_product_types[] = $item->id_product_type;
        }

        $count_cart = $carts->count();
        // dd($count_cart);
        return view('user.cart', compact('carts', 'result', 'count_cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_qty' => 'required',
            'id_product_type' =>'required',
            'id_user' => 'required'
        ]);

        $cart = Cart::whereRaw('concat(id_product_type, id_user) = ?', [$request->id_product_type.$request->id_user])->first();

        if ($cart != null) {
            $cart->qty = $request->product_qty + $cart->qty;
            $update_qty = $cart->save();
            if($update_qty){
                return back()->with(['success' => 'Produk berhasil ditambahkan!']);
            }
            return back()->with('loginError', 'Gagal Tambah Produk');
        }else{
            $data = new Cart();
            $data->qty = $request->product_qty;
            $data->id_product_type = $request->id_product_type;
            $data->id_user = $request->id_user;

            $masuk = $data->save();

            if($masuk){
                return back()->with(['success' => 'Produk Berhasil Ditambahkan!']);
            }
            return back()->with('loginError', 'Gagal Tambah Produk');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Integer $id)
    {
        $user_id = Auth::user()->id;
        for ($i=0; $i < $id; $i++) { 
            $id_type = $user_id.$request->id_product_type[$i];
            $cart = Cart::whereRaw('concat(id_product_type, id_user) = ?', [$id_type])->first();
            $cart->qty = $request->qty[$i];
            $update = $cart->save();
            if($update){
                return back()->with(['success' => 'Produk Berhasil Diupdate!']);
            }
            return back()->with('loginError', 'Gagal Update Qty Produk!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Cart::whereRaw('concat(id_product_type, id_user) = ?', [$id])->first();
        if ($data != null) {
            $delete = $data->delete();
            if($delete){
                return redirect()->route('cart.index')->with('success', 'Berhasil Dihapus dari Cart');
            }
            return redirect()->route('cart.index')->with('error', 'Gagal Dihapus dari Cart');
        }

    }
}
