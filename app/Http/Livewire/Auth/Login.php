<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Login extends Component
{

    public User $user;
    public $password;

    protected $rules = [
        'user.email' => 'required|email',
        'password' => 'required|min:4'
    ];

    protected $message =[
        'user.email.required' => 'Email is Required',
        'password.required' => 'Password is Required'
    ];

    public function authUser()
    {
        $this->validate();

        if (auth()->attempt([
            'email' => $this->user->email,
            'password' => $this->password])) {

            return redirect()->route('Admin.dashboard');

        }

        $this->addError('email', trans('auth.failed'));
    }

    public function updated()
    {
        $this->validate();
    }


    public function mount(): void
    {
        $this->user = new User;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.auth.login')
            ->extends('layouts.app');
    }
}
