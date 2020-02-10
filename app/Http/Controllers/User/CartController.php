<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;
use App\Models\Buy;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index(Request $request)
    {
        //
        $cart = Cart::with('product','variants')->where('user_id',Auth::user()->id)->get();
        $total = Cart::where('user_id',Auth::user()->id)->sum('price');
        $quantity = Buy::where('user_id',Auth::user()->id)->sum('quantity');
       //$product = Produce::where('category_id',$cart->)
       $buy = Buy::where('user_id',Auth::user()->id)->get();
       //dd($cart);



        return view('user.cart',compact('cart','total','quantity','buy'));


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
        // dd($request->all());
       
        $product = Product::find($request->id);
        if($product == null)
        {
            return back()->with('error','Not found Product');
        }
       
        //dd($check);
        if($request->variant == 1 )
        {
            $total = ($request->price*$request->number);
       
            $data = [
                'user_id'=>Auth::user()->id,
                'product_id'=>$request->id,
                'number_product'=> $request->number,
                'variant'=>$request->variant_id,
                'price'=>$total,
            ];
            $cart = Cart::create($data);
            $cart->save();
        }
        if($request->variant == 0)
        {
            $check = Cart::where('user_id',Auth::user()->id)->where('product_id',$request->id)->first();
            if($check != null && $check->variant == 0)
            {
                $number = Cart::where('user_id',Auth::user()->id)->where('product_id',$request->id)->first();
                //dd($number->number_product);
                $sum = $number->number_product + $request->number; 
                $total = $number->price + ($request->number*$request->price);
                $cart = Cart::where('user_id',Auth::user()->id)
                ->where('product_id',$request->id)->update(['number_product'=>$sum,'price'=>$total]);
                return back()->with('success','Add successfull cart'); dd($total);
            }
            
            $total = ($request->price*$request->number);
           
            $data = [
                'user_id'=>Auth::user()->id,
                'product_id'=>$request->id,
                'number_product'=> $request->number,
                'variant'=> 0,
                'price'=>$total,
            ];
            $cart = Cart::create($data);
            $cart->save();
        }
        
        
        

        return back()->with('success','Add successfull cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(Auth::check())
        {
            $cart = Cart::with('product')->where('user_id',$id)->get();
            $total = Product::whereHas('cart')->sum('price');
            $quantity = Cart::where('user_id',Auth::user()->id)->sum('number_product');

           
            $total = number_format($total,3,'.');
        }
        return view('user.cart',compact('cart','total','quantity'));


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
            //dd($request->all());
            $cart = Cart::find($id);

            if($cart->variant != 0 )
            {
                $variant = Variant::find($cart->variant);
                $total = $request->number*$variant->price ; 
                //return response()->json(['variant'=>$variant]);
            }
            if($cart->variant == 0)
            {
                $priceProduct = Product::find($request->product_id);
                $total = $request->number*$priceProduct->price;
            }

            
            //dd($total);
            
            $cart->update(['price'=>$total,'number_product'=>$request->number]);
            $cart['price'] = number_format($cart->price,3) ;

            $buy = Buy::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->update(['quantity'=>$cart->number_product,'total_money'=>$total]);
            
            $total = Buy::where('user_id',Auth::user()->id)->sum('total_money');
            $quantity = Buy::where('user_id',Auth::user()->id)->sum('quantity');
            $total = number_format($total,3);

        return response()->json(['success'=>$cart,'total'=>$total,'quantity'=>$quantity]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }
}
