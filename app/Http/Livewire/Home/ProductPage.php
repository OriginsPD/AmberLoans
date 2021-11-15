<?php

namespace App\Http\Livewire\Home;

use App\Models\Loan;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPage extends Component
{
    use WithPagination;

    public int $paginator = 3;

    public function seeMore(): void
    {
        $this->paginator += 3;
    }

    public function render()
    {
        return view('livewire.home.product-page',[
            'loans' => Loan::paginate($this->paginator),
        ])
            ->extends('layouts.app');
    }
}
