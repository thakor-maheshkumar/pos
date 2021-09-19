<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Order_Detail;
use App\Transaction;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $maxId=Order_Detail::max('order_id');
        $order_receipt=Order_Detail::where('order_id',$maxId)->get();
        return view('orders.index',compact('products','order_receipt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $orders=new Order;
        $orders->name=$request->customer_name;
        $orders->address=$request->customer_address;
        $orders->save();
        $order_id=$orders->id;

        for($product_id=0;$product_id < count($request->product_id); $product_id++){
            $order_detail=new Order_Detail;
            $order_detail->order_id=$order_id;
            $order_detail->product_id=$request->product_id[$product_id];
            $order_detail->quantity=$request->quantity[$product_id];
            $order_detail->unitprice=$request->price[$product_id];
            $order_detail->amount=$request->total_amount[$product_id];
            $order_detail->discount=$request->discount[$product_id];
            $order_detail->save();
        }

        $transaction=new Transaction;
        $transaction->order_id=$order_id;
        $transaction->user_id=auth()->user()->id;
        $transaction->payement_method=$request->payment_method;
        $transaction->balance=$request->balance;
        $transaction->paid_amount=$request->payment_amount;
        $transaction->transac_amount=$order_detail->amount;
        $transaction->transac_date=date('Y-m-d');
        $transaction->save();
        return "done";
        $products=Product::all();
        $order_details=Order_Detail::where('order_id',$order_id)->get();
        $orderBy=Order::where('id',$order_id)->get();

        return view('orders.index',[
            'products'=>$products,
            'order_details'=>$order_details,
            'customers'=>$orderBy,
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
