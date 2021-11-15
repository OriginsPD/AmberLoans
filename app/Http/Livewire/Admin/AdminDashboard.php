<?php

namespace App\Http\Livewire\Admin;


use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\RequestLoan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDashboard extends Component
{
    use WithPagination;

    public bool $isDash = true;
    public bool $isRequest = false;
    public bool $isCustomer = false;
    public bool $isSchedule = false;

    public int $paginator = 4;
    public $search = '';

    protected $listeners = [
        'refresh' => 'render',
        'home' => 'home',
        'show-loans-request' => 'showRequest',
        'show-customer' => 'showCustomer',
        'show-schedule' => 'showSchedule'

    ];

    public function seeMore(): void
    {
        $this->paginator += 4;
    }

    public function home(): void
    {
        $this->isDash = true;
        $this->isRequest = false;
        $this->isCustomer = false;
        $this->isSchedule = false;
    }

    public function showRequest(): void
    {
        $this->isDash = false;
        $this->isCustomer = false;
        $this->isSchedule = false;
        $this->isRequest = true;

    }

    public function showCustomer(): void
    {
        $this->isDash = false;
        $this->isRequest = false;
        $this->isSchedule = false;
        $this->isCustomer = true;
    }

    public function showSchedule(): void
    {
        $this->isDash = false;
        $this->isRequest = false;
        $this->isCustomer = false;
        $this->isSchedule = true;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }


    public function render(): Factory|View|Application
    {
        return view('livewire.admin.admin-dashboard', [

            'loans' => Loan::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('loan_percentage', 'like', '%' . $this->search . '%')
                ->orWhere('end_value', 'like', '%' . $this->search . '%')
                ->paginate($this->paginator),

            'requestLoans' => RequestLoan::with(['customer', 'loan', 'user'])->whereHas('customer', function ($query) {
                $query->where('first_nm', 'like', '%' . $this->search . '%');
                $query->orWhere('last_nm', 'like', '%' . $this->search . '%');
            })
                ->paginate($this->paginator),

            'customers' => Customer::where('first_nm', 'like', '%' . $this->search . '%')
                ->orWhere('last_nm', 'like', '%' . $this->search . '%')
                ->paginate($this->paginator),

            'schedules' => Appointment::with('customer')->WhereHas('customer', function ($query) {
                $query->where('first_nm', 'like', '%' . $this->search . '%');
                $query->orWhere('last_nm', 'like', '%' . $this->search . '%');
            })->paginate($this->paginator),

            'allLoans' => Loan::all()->count(),

            'allCustomer' => Customer::count(),

            'loanRequest' => RequestLoan::all()->count(),

            'allInterview' => Appointment::count()
        ])
            ->extends('layouts.admin');
    }

}
