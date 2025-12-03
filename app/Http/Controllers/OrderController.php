<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Events\OrderUpdates;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
            'status' => 'pending'
        ]);

        return $order;
    }

    public function list(Request $request)
    {
        return Order::where('user_id', $request->user()->id)->get();
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        broadcast(new OrderUpdates($order))->toOthers();

        return ['message' => 'Status updated'];
    }
}
