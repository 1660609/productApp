<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Intervention\Image\Facades\Image;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.edit_profile');
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
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $profile = Profile::where('user_id',$id)->first();
        //dd($profile);
        //dd($profile);
        if($profile == null)
        {
            $profile = Profile::create([
                'user_id'=>Auth::user()->id
            ]);
            return view('admin.edit_profile',compact('profile'));
        }
        return view('admin.edit_profile',compact('profile'));
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
        $profile = Profile::find($id);
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'description'=>$request->descritption,
            'phone'=>$request->phone,
            'DOB'=>$request->DOB,
            'gioitinh'=>$request->gioitinh,
            'type'=> '1',
        ];
        if($request->file('avatar'))
        {
            $img = $request->file('avatar');
            $filename = time().'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(250,250)->save(public_path('upload/avatar/'.$filename));
            $avatar = $filename ;
            $profile->avatar = $avatar;
        }
        $profile->update($data);
        $profile->save();
        return back()->with('success','update successfull profile');
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
