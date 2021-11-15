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
    public Appointment $appointment;

    public $appointment_id;
    public $set_date;
    public $time_slot;
    public int $status = 3;

    protected $listeners = ['refresh' => 'render'];

    protected array $rules = [
        'appointment_id' => 'required',
        'set_date' => 'required|after:today',
        'time_slot' => 'required',
        'status' => 'required',
    ];

    public function reBook(SendAppointmentMail $sendAppointmentMail): void
    {
        $this->validate();

        Appointment::where('id', $this->appointment_id)
            ->update([
                'status' => $this->status,
                'updated_at' => now()
            ]);

        $id = Appointment::where('id', $this->appointment_id)->first();


        $this->appointment::create([
            'customer_id' => $id->customer_id,
            'set_date' => $this->set_date,
            'time_slot' => $this->time_slot
        ]);

        $sendAppointmentMail->execute($id);

        sleep(1);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success', 'Appointment ReBooked Successfully');

        $this->emitSelf('refresh');

    }

    public function attended(SendAppointmentMail $sendAppointmentMail): void
    {
        $this->validate([
            'appointment_id' => 'required',
            'status' => 'required',
        ]);


        Appointment::where('id', $this->appointment_id)
            ->update([
                'status' => $this->status,
                'updated_at' => now()
            ]);


        sleep(1);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success', 'Appointment Status Updated Successfully');
    }

    public function updated()
    {
        $this->validate();
    }

    public function mount()
    {
        $this->appointment = new Appointment;
    }


    public function render(): Factory|View|Application
    {
        return view('livewire.admin.create.reschedule', [
            'bookAppointments' => Appointment::with('customer')
                ->where('status', '=', null)
                ->get(),
        ])->extends('layouts.admin');
    }
}
