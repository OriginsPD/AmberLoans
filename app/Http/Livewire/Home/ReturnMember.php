<?php

namespace App\Http\Livewire\Home;

use App\Models\Customer;
use App\Models\Loan;
use App\Models\RequestLoan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ReturnMember extends Component
{
    public Customer $customer;
    public bool $foundMember = false;
    public $loanType;


    protected array $rules = [
        'customer.email' => 'required|email',
    ];

    public function makeRequest(): void
    {
        $this->validate([
            'loanType' => 'required'
        ]);

        RequestLoan::create([
            'customer_id' => $this->customer->getAttributeValue('id'),
            'loan_id' => $this->loanType,
        ]);

        sleep(2);

        $this->dispatchBrowserEvent('show-alert');
        $this->dispatchBrowserEvent('close-modal');
        session()->put('status', 0);
        session()->put('success', 'Request Made Response will Be Sent Soon');

        $this->foundMember = false;

        $this->customer = new Customer;
    }

    public function selectedMember(): void
    {

        $this->validateOnly('customer.email');

        $selectedCustomer = Customer::where('email', $this->customer->email)->first();

        if ($selectedCustomer) {
            $this->customer = $selectedCustomer;
            $this->foundMember = true;
        }

        $this->addError('customer.email', trans('auth.failed'));
    }

    public function updated(): void
    {
        $this->validate();
    }

    public function mount(): void
    {
        $this->customer = new Customer;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.home.return-member', [
            'loans' => Loan::all(),
        ])->extends('layouts.app');
    }
}
