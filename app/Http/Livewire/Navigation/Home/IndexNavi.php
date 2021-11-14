<?php

namespace App\Http\Livewire\Navigation\Home;

use App\Models\Loan;
use Livewire\Component;

class IndexNavi extends Component
{

    public function render()
    {
        return view('livewire.navigation.home.index-navi', [
            'loans' => Loan::limit(4)->get()
        ]);
    }
}
