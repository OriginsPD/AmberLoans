<?php

namespace App\Http\Livewire\Admin\Create;

use App\Models\ActiveLoan;
use App\Models\RequestLoan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class InterviewReview extends Component
{
    public $customer_id;
    public $loan_value = 0;
    public $payment_value;
    public $requestLoan;


    public $checklist = 0;

    public $activeloan;
    public $rejectloan;

    public $loopAppoints = [
        0 => 1,
        1 => 2,
        2 => 3,
        3 => 4,
    ];

    protected $rules = [
        'customer_id' => 'required',
        'loan_value' => 'required',
    ];

    public function checked(): void
    {
        ++$this->checklist;

        if ($this->checklist === 9) {
            $this->dispatchBrowserEvent('show-accept');
        }
    }

    public function activeLoan(): void
    {
        $this->dispatchBrowserEvent('show-form');
        $this->activeloan = 1;
        $this->checklist = 0;
    }

    public function rejectLoan(): void
    {
        $this->dispatchBrowserEvent('show-form');
        $this->rejectloan = 1;
        $this->checklist = 0;
    }

    public function gaveLoan(): void
    {
        $this->validate();

        RequestLoan::where('customer_id', $this->customer_id)->update([
            'status' => 1,
            'approve_date' => now(),
            'approved_by' => auth()->id()
        ]);

        $value = RequestLoan::with('loan')->where('customer_id', $this->customer_id)->first();

        ActiveLoan::create([
            'request_id' => $value->id,
            'loan' => $this->loan_value,
            'payment_amount' => $this->loan_value * $value->loan->monthly_payment
        ]);

        sleep(1);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success', 'Loan Activated');

        $this->customer_id = '';
        $this->loan_value = 0;
        $this->payment_value = '';
        $this->requestLoan = '';

        $this->activeloan = 0;
        $this->rejectloan = 0;
    }

    public function deniedLoan()
    {

        $this->validateOnly('customer_id');

        RequestLoan::where('customer_id', $this->customer_id)->update([
            'status' => 2,
            'approve_date' => now(),
            'approved_by' => auth()->id()
        ]);

        sleep(1);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success', 'Loan Rejected');

        $this->activeloan = 0;
        $this->rejectloan = 0;

    }

    public function updated(): void
    {
        $this->validate();
    }

    public function render(): Factory|View|Application
    {
        if ($this->customer_id) {

            $this->requestLoan = RequestLoan::with('loan')->where('customer_id', $this->customer_id)->first();
        } else {
            $this->requestLoan = RequestLoan::with('loan')->get();
        }

        return view('livewire.admin.create.interview-review', [
            'Requests' => RequestLoan::with('customer', 'loan')->where('status', 0)->get(),
            'RequestLoans' => $this->requestLoan,
        ]);
    }
}
