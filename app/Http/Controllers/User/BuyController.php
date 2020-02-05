<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy; 
use App\Models\Cart;
use App\Models\Address;
use Auth;

class BuyController extends Controller
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
    public function index()
    {
        //
        $buy = Buy::where('user_id',Auth::user()->id)->with('product')->get();
        $total = Buy::where('user_id',Auth::user()->id)->sum('total_money');
        $address = Address::where('user_id',Auth::user()->id)->get();

        return view('user.buy_product',compact('buy','total','address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        dd($request->total);
        return view('user.buy_product');
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
       
        $card = Cart::find($request->id);
        $buy =  Buy::updateOrCreate(
            ['product_id'=> $card->product_id,'user_id'=>Auth::user()->id],
            ['quantity'=> $card->number_product,'total_money'=> $card->price,]
        );
        $buy->save();
        $total = Buy::where('user_id',Auth::user()->id)->sum('total_money');
        $quantity = Buy::where('user_id',Auth::user()->id)->sum('quantity');
        $total = number_format($total,3);

    return response()->json(['success'=>$buy,'total'=>$total,'quantity'=>$quantity]);
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
        
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    
    }

    public function destroy($id)
    {
        //
        $card = Cart::find($id);
        $buy = Buy::where('user_id',$card->user_id)->where('product_id',$card->product_id);
        $buy->delete();

        $total = Buy::where('user_id',Auth::user()->id)->sum('total_money');
        $quantity = Buy::where('user_id',Auth::user()->id)->sum('quantity');
        $total = number_format($total,3);

        return response()->json(['success'=>'ok','total'=>$total,'quantity'=>$quantity]);
    }
}
