<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PlaceOrderRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::where('level', '!=', 0)->get();
        $products = Product::take(15)->get();
        return view('frontend.index', compact('categories', 'products'));
    }

    // Get Peoducts of Selected Category with Media
    public function getProducts($category_id)
    {
        if($category_id)
        {
            $category = Category::where('id', $category_id)->first();
            $products = Product::where('category_id', $category_id)->with('media')->take(15)->get();
            return view('frontend.category_products', compact('products', 'category'));
        }
    }

    // Get Single Peoduct
    public function singleProducts($product_id)
    {
        $productDetails = Product::where('id', $product_id)->with('category', 'media')->get();
        $relatedProducts = Product::where('category_id', $productDetails[0]['category_id'])
            ->where('id', '!=', $product_id)
            ->with('category', 'media')->take(4)->get();
        return view('frontend.single_product', compact('productDetails', 'relatedProducts'));
    }

    // Add to cart
    public function addToCart(Request $request)
    {

        if($request->product_id > 0){
            if(Cart::where('product_id', $request->product_id)->exists())
            {
                Cart::where('product_id', $request->product_id)->update([
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity
                ]);
            }
            else{
                Cart::create([
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity
                ]);
            }

            return response()->json(
                [
                    'statusCode' => 200,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity
                ]);
        }
        return false;
    }

    // View cart
    public function cartView($product_id, $quantity)
    {
        $product = Product::where('id', $product_id)->with('media', 'shippingType')->get();
        return view('frontend.cart_view', compact('product', 'quantity'));
    }

    // Checkout page view
    public function checkout(){
        $cart = Cart::orderBy('id', 'DESC')->first();
        $product = Product::where('id', $cart->product_id)->with('media')->get();
        $quantity = $cart->quantity;
        return view('frontend.checkout', compact('product', 'quantity'));
    }

    // Place order info save
    public function placeOrder(PlaceOrderRequest $request)
    {
        $cart = Cart::orderBy('id', 'DESC')->first();
        if($cart)
        {
            if($request->product_id == $cart->product_id)
            {
                $placeOrder = Order::create([
                    'product_id' => $request->product_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'contact' => $request->contact,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'appartment' => $request->appartment,
                    'postal_code' => $request->postal_code,
                    'total_price' => $request->total_price,
                    'quantity' => $cart->quantity,
                    'address' => $request->address,
                    'status' => 'pending',
                ]);

                if($placeOrder)
                {   Cart::where('id', '!=', null)->delete();
                    return redirect()->route('frontend.thankyou');
                }
                else{
                    return redirect()->back()->with('message', 'There are something went wrong. Please Try Again.');
                }
            }
            else{
                return redirect()->back()->with('message', 'There are something went wrong. Please Try Again.');
            }
        }
        else{
            return redirect()->back()->with('message', 'There are something went wrong. Please Try Again.');
        }
    }

    // Thank you
    public function thankyou()
    {
        return view('frontend.thankyou');
    }

    // About us page return
    public function aboutus()
    {
        return view('frontend.aboutus');
    }

    // Return contact us page
    public function contactUs()
    {
        return view('frontend.contact_us');
    }

    // Save contact us form data
    public function contactStore(ContactRequest $request)
    {
        $contact = Contact::create([
            'message' => $request->message,
            'name' => $request->name,
            'email' => $request->message,
            'subject' => $request->message,
            'postal_code' => $request->postal_code,
        ]);
        if($contact){
            return redirect()->back()->with('message', 'Your message submit successfully.');
        }
    }


    public function subscribers(Request $request)
    {
        $subscribe = Subscriber::create([
            'email' => $request->email,
        ]);
        if($subscribe){
            return redirect()->back()->with('subscribe', 'Congratulations! You have successfully subscribed to our newsletter.');
        }

    }
}
