<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Voucher;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $orders = Order::where('id_user', $user)->get();
        $count = $orders->count();
        $details = array();

        foreach ($orders as $order) {
            $id_order[] = $order->id;
        }
        for ($i=0; $i < $count ; $i++) { 
            $details[] = OrderDetail::select('product.id' ,'product_pict.name as picture_name', 
            'product.name as product_name', 'product.price', 'product.stock', 'order.status',
            'product_type.type', 'order_detail.qty', 'order.total', 'order.discount', 'order.id',
            'order.order_time', 'order.order_date')
            ->where('id_order', $id_order[$i])
            ->join('product_type', 'product_type.id','=', 'order_detail.id_product_type')
            ->join('product', 'product.id','=', 'product_type.id_product')
            ->join('product_pict', 'product_pict.id_product', '=', 'product.id')
            ->join('order', 'order.id','=', 'order_detail.id_order')
            ->where('product_pict.status', '1')
            ->where('order.id_user', $user)
            ->get();
        }

        $id_order = $request->id_order;
        $keys = array_keys($details);
            for($i = 0; $i < count($details); $i++) {
                // echo $keys[$i] . "{<br>";
                foreach($details[$keys[$i]] as $key => $value) {
                    if ($value->id == $id_order) {
                        $order_status = Order::find($value->id);
                        $order_status->status = 'closed';
                        $update = $order_status->save();
                    }
                    // if($value->status == 'open'){
                    //     $begin = new DateTime('now');
                    //     $end = new DateTime($value->order_date);
                    //     $diff = $begin->diff($end);
                    //     $diff->format("%h jam %i menit");
                        
                    //     if ($diff->h > 3 && $diff->d >= 0) {
                    //         $order_status = Order::find($value->id);
                    //         $order_status->status = 'closed';
                    //         $update = $order_status->save();
                    //     }else{
                    //         $order_status = Order::find($value->id);
                    //         $order_status->status = 'open';
                    //         $update = $order_status->save();
                    //     }
                    
                }
                
            }
        $order_closed = Order::where('id_user', $user)
            ->where('status','closed')->get();
        if ($order_closed != null) {
            $total = Order::where('id_user', $user)
                        ->where('status','closed')
                        ->sum('total');
            if ($total >= 1000000) {
                $voucher = Voucher::where('status', 'active')->first();
                $voucher_code = $voucher->voucher_code;
            } else {
                $voucher_code = "-";
            }
        }else{
            $total = 0;
        }
        
        return view('user.history', compact('orders', 'details', 'count', 'orders','total', 'voucher_code'));
    }

    public function open()
    {
        $user = Auth::user()->id;
        $orders = Order::where('id_user', $user)->get();
        $count = $orders->count();

        foreach ($orders as $order) {
            $id_order[] = $order->id;
        }
        
        for ($i=0; $i < $count ; $i++) { 
            $details[] = OrderDetail::select('product.id' ,'product_pict.name as picture_name', 
            'product.name as product_name', 'product.price', 'product.stock', 
            'product_type.type', 'order_detail.qty', 'order.total', 'order.discount', 'order.id')
            ->where('id_order', $id_order[$i])
            ->join('product_type', 'product_type.id','=', 'order_detail.id_product_type')
            ->join('product', 'product.id','=', 'product_type.id_product')
            ->join('product_pict', 'product_pict.id_product', '=', 'product.id')
            ->join('order', 'order.id','=', 'order_detail.id_order')
            ->where('product_pict.status', '1')
            ->where('order.id_user', $user)
            ->where('order.status', 'open')
            ->get();
        }
        return view('user.history-open', compact('orders', 'details', 'count'));
    }

    public function closed(){
        $user = Auth::user()->id;
        $orders = Order::where('id_user', $user)->get();
        $count = $orders->count();

        foreach ($orders as $order) {
            $id_order[] = $order->id;
        }
        for ($i=0; $i < $count ; $i++) { 
            $details[] = OrderDetail::select('product.id' ,'product_pict.name as picture_name', 
            'product.name as product_name', 'product.price', 'product.stock', 
            'product_type.type', 'order_detail.qty', 'order.total', 'order.discount', 'order.id')
            ->where('id_order', $id_order[$i])
            ->join('product_type', 'product_type.id','=', 'order_detail.id_product_type')
            ->join('product', 'product.id','=', 'product_type.id_product')
            ->join('product_pict', 'product_pict.id_product', '=', 'product.id')
            ->join('order', 'order.id','=', 'order_detail.id_order')
            ->where('product_pict.status', '1')
            ->where('order.id_user', $user)
            ->where('order.status', 'closed')
            ->get();
        }

        $order_closed = Order::where('id_user', $user)
        ->where('status', 'closed')
        ->get();
        $count_details = count($order_closed);
        // dd($count_details);
        return view('user.history-closed', compact('orders', 'details', 'count', 'count_details'));
    }
}
