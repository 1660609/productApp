<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\MaiNotify;
use App\Models\Buy;
use Mail;
use Auth;
class EmailController extends Controller
{
    //
    public function sendEmail()
    {
        $buy = Buy::where('user_id',Auth::user()->id)->get();
        $user = Auth::user()->email;
        Mail::to($user)->send(new MaiNotify($user,$buy));
 
      echo "success";
    }
}
