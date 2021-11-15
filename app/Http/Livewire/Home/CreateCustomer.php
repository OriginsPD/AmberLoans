<?php

namespace App\Http\Livewire\Home;

use App\Models\Customer;
use App\Models\Loan;
use App\Models\RequestLoan;
use Livewire\Component;

class CreateCustomer extends Component
{
    public Customer $customer;
    public $loanType;

    protected $rules = [
        'customer.first_nm' => 'required|min:4',
        'customer.last_nm' => 'required|min:4',
        'customer.email' => 'required|email',
        'customer.contact_no' => 'required|numeric',
        'loanType' => 'required'
    ];

    public function addCustomer(): void
    {
        $this->validate();

        $this->customer->save();

        RequestLoan::create([
            'customer_id' => $this->customer->getAttributeValue('id'),
            'loan_id' => $this->loanType,
        ]);

        sleep(2);

        $this->dispatchBrowserEvent('show-alert');
        $this->dispatchBrowserEvent('close-modal');
        session()->put('status',0);
        session()->put('success','Request Made Response will Be Sent Soon');

        $this->customer = new Customer;

        $this->emit('refresh');

    }

    public function updated(): void
    {
        $this->validate();
    }

    public function mount(): void
    {
        $this->customer = new Customer;
    }


    public function render()
    {
        return view('livewire.home.create-customer',[
            'loans' => Loan::all(),
        ]);
    }
}
