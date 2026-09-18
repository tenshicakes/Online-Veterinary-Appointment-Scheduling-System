<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.guest')]
class AuthPage extends Component
{
    // Form Input Properties
    public $name = '';

    public $email = '';

    public $password = '';

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return redirect()->intended('/home');
        }

        $this->addError('auth_failed', 'The provided credentials do not match our records.');
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'user', // Defaults to Pet Owner
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function resetForm()
    {
        $this->reset(['name', 'email', 'password']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.auth-page');
    }
}
