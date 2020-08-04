<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\bills;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $BillID;
    public function __construct($billId)
    {
        //
        $this->BillID = $billId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $bills = bills::where('bills.Bill_id','=',$this->BillID)->join('orders','bills.Bill_id','=','orders.Bill_id')->join('products','orders.prod_id','=','products.prod_id')->get();
        return $this->view('emails.email')->with([
            'totalPrice' => $bills[0]->Bill_price,
            'orderPrice' => $bills,
        ]);
    }
}
