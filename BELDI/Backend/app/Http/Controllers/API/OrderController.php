<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendOrderConfirmationEmail;


class OrderController extends Controller
{
    public function index()
    {
        return auth()->user()->is_admin
            ? Order::with('items.product', 'user')->get()
            : auth()->user()->orders()->with('items.product')->get();
    }

    public function store(OrderRequest $request)
    {
        return DB::transaction(function () use ($request) {

            $total = 0;

            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => 0,
                'status' => 'pending',
            ]);

            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);

                if ($product->stock < $item['quantity']) {
                    abort(400, 'Not enough stock');
                }

                $product->decrement('stock', $item['quantity']);

                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);

                $total += $product->price * $item['quantity'];
            }

            $order->update(['total' => $total]);

            SendOrderConfirmationEmail::dispatch($order);

            return $order->load('items.product');
        });
    }

    public function show(Order $order)
    {
        $this->authorizeOrder($order);
        return $order->load('items.product');
    }

    private function authorizeOrder(Order $order)
    {
        if (!auth()->user()->is_admin && $order->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
