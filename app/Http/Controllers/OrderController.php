<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $all_orders = DB::table('orders')
            ->join('customers','orders.customer_id','=','customers.customer_id')
            ->select('orders.*','customers.customer_name')
            ->orderby('orders.order_id','desc')->get();
        return view('admin.donhang.manage_order',compact('all_orders'));
    }
    public function view($id) {
        $order_by_id = DB::table('orders')
            ->join('customers','orders.customer_id','=','customers.customer_id')
            ->join('shippings','orders.shipping_id','=','shippings.shipping_id')
            ->join('order_details','orders.order_id','=','order_details.order_id')
            ->select('orders.*','customers.*','shippings.*','order_details.*')->get();

        return view('admin.donhang.view',compact('order_by_id'));
    }
}
