<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Models\Profile;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $user = User::orderBy('id');
        if($request->nameSrc){
            $user->where('name','like','%'.$request->nameSrc.'%');
        }
        if($request->emailSrc){
            $user->where('email','like','%'.$request->emailSrc.'%');
        }
        $user = $user->get();
        return view('admin.show_user',compact('user'));
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
    public function store(UserRequest $request)
    {
        //
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'email'=>'unique:users',
            'password'=>'required|min:6',
            'c_password'=>'required|same:password'
        ]);
        if($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
      
        $user = User::create($data);
        $user->save();
        $profile = Profile::create([
            'user_id'=>$user->id,
        ]);
        return response()->json(['success'=>'Add successfully user']);
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
        $data = User::find($id);
        return view('admin.update_user',compact('data'));
    }
    public function update(UserRequest $request, $id)
    {
        //
        $data = [
            'name'=> $request->name,
            'email'=>$request->email,
        ];
        $user = User::find($id);
        $user->update($data);
        $user->save();
        return back()->with('success', 'Update successful user');
    }
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return back()->with('success', 'Delete successful user');
    }
}
