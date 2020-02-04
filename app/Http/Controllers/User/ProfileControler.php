<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Profile;
use App\Models\Address;
use Auth;


class ProfileControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd(123);
        return view('user.profile');
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
        //kkjkjkjkjk
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($check);
        $check = Profile::where('user_id',Auth::user()->id)->count();
        $address = Address::where('user_id',Auth::user()->id)->get();
        if($check == 0)
        {
            $profile = Profile::create([
                'user_id'=> Auth::user()->id,
                'first_name'=> Auth::user()->name,
            ]);
        }
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('user.profile',compact('profile','address'));
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
        //
        //dd($request->all());
        $profile = Profile::find($id);
        if($request->name)
        {
            $profile->first_name = $request->name ; 
        }
        if($request->DOB)
        {
            $profile->DOB = $request->DOB ; 
        }
        if($request->address)
        {
            $profile->address = $request->address ; 
        }
        if($request->phone)
        {
            $profile->phone = $request->phone;
        }

        if($request->file('avatar'))
        {
            $img = $request->file('avatar');
            $filename = time().'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(250,250)->save(public_path('upload/avatar/'.$filename));
            $avatar = $filename ;
            $profile->avatar = $avatar;
        }
        $profile->save();
        return back();
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
    }
}
