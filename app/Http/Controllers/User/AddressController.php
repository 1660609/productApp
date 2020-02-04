<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use Auth;

class AddressController extends Controller
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
        return view('user.add_address');
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
        //dd(Auth::user()->id);
        if($request->default)
        {
            Address::where('user_id',Auth::user()->id)->update(['default'=> '0']);
            $address = Address::create([
                'user_id'=>Auth::user()->id,
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'default'=> '1'
            ]);
        }
        else{
            $address = Address::create([
                'user_id'=>Auth::user()->id,
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'default'=> '0'
            ]);
        }
 
        $address->save();
        $address = $address->get();
        return view('user.shipping_address',compact('address'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $address = Address::where('user_id',$id)->get();
        //dd($id);
        return view('user.shipping_address',compact('address'));
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
        //dd(Auth::user()->id);
        
        $address = Address::find($id);
        if($request->name)
        {
            $address->name = $request->name;
        }
        if($request->phone)
        {
            $address->phone = $request->phone;
        }
        if($request->address)
        {
            $address->address = $request->address;
        }
        if($request->default)
        {
            Address::where('user_id',Auth::user()->id)->update(['default'=> '0']);
            $address->default = '1';
        }
        $address->save();
        return redirect()->route('address.show',Auth::user()->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $address = Address::find($id);
        $address->delete();
        return redirect()->route('address.show',Auth::user()->id);

    }
}
