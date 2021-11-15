<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookAppointment extends Mailable
{
    use Queueable, SerializesModels;

    public array $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$name)
    {
        $this->details = [
            'name' => $name->first_nm." ".$name->last_nm,
            'date' => $details->set_date,
            'time' => $details->time_slot
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail.BookAppointment')->subject('Amber Loans Appointment Interview');
    }
}
