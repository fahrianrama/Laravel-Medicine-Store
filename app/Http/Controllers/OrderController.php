<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }
    public function getOrderCount()
    {
        $orders = Order::all();
        // count
        $count = $orders->where('status', 'pending')->count();
        return $count;
    }
    public function getUserOrderCount()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id_user)->get();
        // count where status cart
        $count = $orders->where('status', 'cart')->count();
        return $count;
    }
    public function confirm($id)
    {
        // search order from id
        $order = Order::where('id', $id)->first();
        // set status to checkout
        $order->status = 'checkout';
        // update order
        $order->save();
        // redirect to myorder
        return redirect()->route('orders')->with('success', 'Pesanan berhasil di konfirmasi');
    }
    public function success()
    {
        // get order with status checkout
        $orders = Order::where('status', 'checkout')->get();
        return view('order.success', compact('orders'));
    }
}
