<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use DataTables;

class OrderController extends Controller
{

    private $order;

    public function __construct(Order $order) {
        $this->order = $order;
    }

    public function index(){
        $orders = Order::where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('orders', compact('orders'));
    }

    public function userOrders(){
        // $orders = Order::where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('orders');
    }

    public function getUserOrders(Request $request){
        if ($request->ajax()) {
            $data = Order::latest()->get();
            return Datatables::of($data)
                    ->addColumn('product', function($row){
                        $product = Product::find($row->product_id);
                        return $product->title;
                    })
                    ->addIndexColumn()
                    ->make(true);
        }
      
        return view('orders');
    }

    public function allOrders(){
        // $orders = Order::latest()->paginate(10);
        return view('all-orders');
    }

    public function getOrders(Request $request){
        if ($request->ajax()) {
            $data = Order::latest()->get();
            return Datatables::of($data)
                    ->addColumn('product', function($row){
                        $product = Product::find($row->product_id);
                        return $product->title;
                    })
                    ->addIndexColumn()
                    ->make(true);
        }
      
        return view('orders');
    }
}
