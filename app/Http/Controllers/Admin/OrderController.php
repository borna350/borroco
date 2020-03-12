<?php

namespace App\Http\Controllers\Admin;
use App\Models\OrderDetails;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::get();
        return  view('admin.order.index', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::find($id);
        $orderDetails = OrderDetails::where('order_id', $id)->get();
        $payment = Payment::where('order_id', $id)->orderBy('id', 'desc')->first();
        return view('admin.order.show', compact('orders', 'orderDetails', 'payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = OrderDetails::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Order deleted');
    }

    public function orderDone($id){
        $data = Order::find($id);
        $data->status = 'done';
        $data->save();
        return  redirect()->back()->with('success', "Order complete successfully!");
    }

    public function orderReject($id){
        $data = Order::find($id);
        $data->status = 'reject';
        $data->save();
        return  redirect()->back()->with('warning', "Order rejected!");
    }

    public function orderPending($id){
        $data = Order::find($id);
        $data->status = 'pending';
        $data->save();
        return  redirect()->back()->with('warning', "Order move to pending!");
    }
}
