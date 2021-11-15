<?php

namespace App\Action\Mail;

use App\Mail\BookAppointment;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;

class SendAppointmentMail
{

    public function execute($data): void
    {
        $info = Customer::where('id',$data->customer_id)->first();

        Mail::to($info->email)->send(new BookAppointment($data,$info));
    }

}
