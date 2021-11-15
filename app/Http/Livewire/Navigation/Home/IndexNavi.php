<?php

namespace App\Http\Livewire\Navigation\Home;

use App\Models\Loan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class IndexNavi extends Component
{
    public bool $isLoan = false;

    public function render(): Factory|View|Application
    {
        return view('livewire.navigation.home.index-navi', [
            'loans' => Loan::limit(4)->get()
        ]);
    }
}
