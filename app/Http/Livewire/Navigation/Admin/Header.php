<?php

namespace App\Http\Livewire\Navigation\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{

    public function render(): Factory|View|Application
    {
        return view('livewire.navigation.admin.header');
    }

    public function logout(): Redirector|Application|RedirectResponse
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect(route('index'));
    }
}
