<?php

namespace App\Http\Livewire\Admin\Create;

use App\Action\Mail\SendAppointmentMail;
use App\Models\Appointment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Reschedule extends Component
{
    public $selected;
    public $status;

    protected array $rules = [
        'appointment.set_date' => 'required|after:today',
        'appointment.time_slot' => 'required',
    ];

    public function bookAppointment(SendAppointmentMail $sendAppointmentMail): void
    {
        $this->validate();

        if (Appointment::where($this->appointment->attributesToArray())->exists() === false)
        {

            $this->appointment->save();

            $sendAppointmentMail->execute($this->appointment);

            sleep(1);

            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('show-alert');
            session()->put('success', 'Appointment Booked Successfully');

            $this->appointment = new Appointment;

        }

        $this->addError('appointment.customer_id', trans('validation.unique', ['attribute' => 'Appointment']));

    }


    public function mount($selected): void
    {
        $this->selected = $selected;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.admin.create.reschedule');
    }
}
