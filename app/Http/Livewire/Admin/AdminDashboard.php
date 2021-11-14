<?php

namespace App\Http\Livewire\Admin;


use App\Models\Loan;
use Livewire\Component;

class AdminDashboard extends Component
{
    public int $paginator = 4;
    public $search = '';

    public function seeMore(): void
    {
        $this->paginator += 4;
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard', [
            'loans' => Loan::where('name','like', '%'.$this->search.'%')
                ->orWhere('loan_percentage','like', '%'.$this->search.'%')
                ->orWhere('end_value','like', '%'.$this->search.'%')
                ->paginate($this->paginator),
            'allLoans' => Loan::all()
        ])
            ->extends('layouts.admin');
    }

}
