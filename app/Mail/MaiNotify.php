<?php

namespace App\Mail;

use App\Models\Buy;
use App\Models\Payment;
use Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MaiNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $buy = Buy::with('product','variants')->where('user_id',Auth::user()->id)->get();

        $path = [];
        $img = Buy::with('product')->where('user_id',Auth::user()->id)->get();

        foreach($img as $i)
        {
            $path[] = $i->product->thumbnail ; 
        }
        //dd($path);

        return $this->view('emails.emails')->with(['buy'=>$buy,'path'=>$path]);
    }
}
