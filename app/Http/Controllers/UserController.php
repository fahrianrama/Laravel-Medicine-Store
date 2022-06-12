<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Order;

class UserController extends Controller
{
    public function profile()
    {
        // get user from session
        $user = auth()->user();
        // search user from database
        $user = User::where('name', $user->name)->first();
        // return view with user
        return view('user.profile', compact('user'));
    }
    public function getNamebyId($id)
    {
        // search user from database
        $user = User::where('id_user', $id)->first();
        // return user name
        return $user->name;
    }
    public function getLocationbyId($id)
    {
        // search user from database
        $user = User::where('id_user', $id)->first();
        // return user location
        return $user->location;
    }
    public function addcart(Request $request)
    {
        // assign data from request
        $data = $request->all();
        // add status
        $data['status'] = 'cart';
        // add user_id
        $data['user_id'] = Auth::user()->id_user;
        // add data to order
        Order::create($data);
        // return to detail product
        return redirect()->back()->with('success', 'Berhasil menambahkan ke keranjang!');
    }
    public function order()
    {
        // get user from session
        $user = auth()->user();
        // search user from database
        $user = User::where('name', $user->name)->first();
        // search user's orders from database
        $orders = Order::where('user_id', $user->id_user)->get();
        // return view with user and orders
        return view('user.order', compact('user', 'orders'));
    }
    public function success()
    {
        // get user from session
        $user = auth()->user();
        // search user from database
        $user = User::where('name', $user->name)->first();
        // search user's orders from database
        $orders = Order::where('user_id', $user->id_user)->get();
        // return view with user and orders
        return view('user.success', compact('user', 'orders'));
    }
    public function getMedicine($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        return $medicine;
    }
    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)->first();
        $order->delete();
        return redirect()->back()->with('error', 'Pesanan dibatalkan');
    }
    // checkout
    public function checkout($id)
    {
        // search order from id
        $order = Order::where('id', $id)->first();
        // set status to checkout
        $order->status = 'pending';
        // update order
        $order->save();
        // redirect to myorder
        return redirect()->route('myorder')->with('success', 'Pesanan berhasil di checkout');
    }
}
