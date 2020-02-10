<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\MaiNotify;
use App\Models\Buy;
use App\Models\Payment;
use Mail;
use Auth;
class EmailController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
      
      Buy::where('user_id',Auth::user()->id)->update([
        'address'=>$request->addressAd,
        'phone_number'=>$request->phoneAd,
        'name'=>$request->nameAd,
      ]);
      $test = Buy::where('user_id',Auth::user()->id)->get();

      foreach ($test as $t)
      {

        $payment = Payment::create([
          'user_id' => $t->user_id,
          'product_id'=>$t->product_id,
          'variant_id'=>$t->variant_id,
          'address'=>$t->address,
          'phone_number'=>$t->phone_number,
          'name'=>$t->name,
          'quantity'=>$t->quantity,
          'total_money'=>$t->total_money,
          'paid'=> "0" ,
        ]);
        $payment->save();
      }
      
     // dd($request->all());
        $buy = Buy::with('product','variants')->where('user_id',Auth::user()->id)->get();
        $user = Auth::user()->email;
        Mail::to($user)->send(new MaiNotify($user));
        Buy::where('user_id',Auth::user()->id)->delete();

        return redirect()->route('cart.index');
    }
}
