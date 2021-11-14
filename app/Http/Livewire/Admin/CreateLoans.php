<?php

namespace App\Http\Livewire\Admin;

use App\Models\Loan;
use Livewire\Component;

class CreateLoans extends Component
{
    public Loan $loan;

    protected array $rules = [
        'loan.name' => 'required|min:4',
        'loan.start_value' => 'required|min:50000|max:90000000|numeric',
        'loan.end_value' => 'required|max:90000000|numeric',
        'loan.loan_percentage' => 'required',
        'loan.duration' => 'required|min:5|numeric',
        'loan.monthly_payment' => 'required',
    ];

    public function createLoan()
    {
        $this->validate();

        $this->loan->save();

        sleep(2);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success', $this->loan->name.' Created Successfully');




        $this->loan = new Loan;
    }

    public function updated(): void
    {
        $this->validate();
    }

    public function mount(): void
    {
        $this->loan = new Loan;
    }

    public function render()
    {
        return view('livewire.admin.create-loans');
    }
}
