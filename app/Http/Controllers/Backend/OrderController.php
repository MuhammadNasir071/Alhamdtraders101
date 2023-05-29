<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{

    use JsonResponse;
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all();
        return view('backend.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        $product = Product::where('id', $order->product_id)->with('media', 'shippingType')->get();
        return view('backend.orders.show', compact('order', 'product'));
    }

    public function edit($id)
    {
        $order = Order::where('id', $id)->first();
        return view('backend.orders.edit', compact('order'));
    }


    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        if($order)
        {
            Order::where('id', $id)->update([
                'status' => $request->status,
            ]);
        }
        return $this->success('Record update successfully.', ['success' => true, 'data' => null]);
    }


    public function queries()
    {
        $queries = Contact::all();
        return view('backend.queries.index', compact('queries'));
    }

    public function queryShow($id)
    {
        $query = Contact::findOrFail($id);
        return view('backend.queries.show', compact('query'));
    }

    public function queryDelete($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            return $this->success('Record deleted successfully', ['success' => true, 'data' => null]);
        } catch (\Throwable $th) {
            return $this->error('Unit not found', Response::HTTP_NOT_FOUND, ['success' => false, 'data' => null]);
        }
    }
}
