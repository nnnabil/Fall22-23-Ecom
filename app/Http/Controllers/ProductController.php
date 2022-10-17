<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function list(){

        $products = Product::all();
        return view('pages.product.list')->with('products',$products);

    }
    public function addtocart(Request $req){
        $id = $req->id;
        $p = Product::where('id',$id)->first();
        $cart=[];
        //$jsonCart = $req->session()->get('cart'); to get session value
        //session()->get('cart')
        if(session()->has('cart')){
            $cart = json_decode(session()->get('cart'));
        }
        $product = array('id'=>$id,'qty'=>1,'name'=>$p->name,'price'=>$p->price,'image'=>$p->image);
        $cart[] = (object)($product);
        $jsonCart = json_encode($cart);
        session()->put('cart',$jsonCart);
        // return session()->get('cart');
        return redirect()->route('products.list');
    }
    public function emptycart(){
        session()->forget('cart');
        if(!session()->has('cart')){
            return redirect()->route('products.mycart');
        }
        return session('cart');

    }
    public function mycart(){
        $cart = json_decode(session()->get('cart'));
        return view('pages.product.cart')
        ->with('cart',$cart);
    }
    public function checkout(Request $req){
        //let when logged in there will be a field in session
        $products = json_decode(session()->get('cart'));
        //creating order
        $customer_id = session()->get('user');
        $order = new Order();
        $order->customer_id = $customer_id;
        $order->status="Ordered";
        $order->price = $req->total_price;
        $order->save();

        //creating order details
        foreach($products as $p){
            $o_d = new OrderDetail();
            $o_d->order_id = $order->id;
            $o_d->product_id = $p->id;
            $o_d->quantity = $p->qty;
            $o_d->unit_price = $p->price;
            $o_d->save();
        }

        session()->forget('cart');

        return "Pruchase Done!";


    }
}