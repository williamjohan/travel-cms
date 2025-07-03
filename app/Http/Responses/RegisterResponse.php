<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;


class RegisterResponse implements RegisterResponseContract

{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function toResponse($request)
    {
        // Logout user yang baru saja didaftarkan
        $this->guard->logout();

        // Set flash message untuk sukses pendaftaran
        session()->flash('status', 'Registration successful! Please log in.');

        // Redirect ke halaman login
        return redirect()->route('login')->with('success', 'Berhasil register! Silakan login.');
    }
}
