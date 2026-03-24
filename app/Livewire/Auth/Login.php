<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($this->only(['email', 'password']))) {
            return redirect()->route('dashboard');
        }

        $this->addError('email', 'Invalid credentials!');
    }

    #[Layout('layouts.fullscreen-layout')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
