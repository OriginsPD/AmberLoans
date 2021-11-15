<?php

namespace App\Http\Livewire\Admin\Create;

use App\Action\Mail\SendAppointmentMail;
use App\Mail\BookAppointment;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\RequestLoan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class CreateRequest extends Component
{

    public Appointment $appointment;

    protected $rules = [
        'appointment.customer_id' => 'required',
        'appointment.set_date' => 'required|after:today',
        'appointment.time_slot' => 'required',
    ];

    public function bookAppointment(SendAppointmentMail $sendAppointmentMail): void
    {
        $this->validate();

        if (Appointment::where($this->appointment->attributesToArray())->exists() === false)
        {

            $this->appointment->save();

            RequestLoan::where('id',$this->appointment->customer_id)
                ->update([
                    'status' => 1,
                    'approve_date' => now(),
                    'approved_by' => auth()->id(),
                ]);

            $sendAppointmentMail->execute($this->appointment);

            sleep(1);

            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('show-alert');
            session()->put('success', 'Appointment Booked Successfully');

            $this->appointment = new Appointment;

        }

        $this->addError('appointment.customer_id', trans('validation.unique', ['attribute' => 'Appointment']));

    }

    public function updated(): void
    {
        $this->validate();
    }

    public function mount(): void
    {
        $this->appointment = new Appointment;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.admin.create.create-request', [
            'requestLoans' => RequestLoan::with('customer')->where('status',0)->get(),
        ]);
    }
}
