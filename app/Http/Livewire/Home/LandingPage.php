<?php

namespace App\Http\Livewire\Home;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class LandingPage extends Component
{

    public bool $newCustomer = false;
    public bool $member = false;
    public bool $slide = false;

    protected $listeners = ['reset' => 'resetSlide'];

    public function newCustomer(): void
    {
        $this->newCustomer = true;
        $this->member = false;
        $this->slide = true;
    }

    public function returnMember(): void
    {
        $this->member = true;
        $this->newCustomer = false;
        $this->slide = true;
    }

    public function resetSlide(): void
    {
        $this->newCustomer = false;
        $this->member = false;
        $this->slide = false;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.home.landing-page')
            ->extends('layouts.app');
    }
}
