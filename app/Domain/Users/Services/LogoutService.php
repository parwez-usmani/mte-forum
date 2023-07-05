<?php

namespace App\Domain\Users\Services;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LogoutService extends Component
{
    use AuthorizesRequests;
    public function render()
    {
        $user = Auth::user();
        return view('livewire.logout');
    }
    public function logoutuser()
    {
        Auth::logout();
        Session::flush();
        return redirect()->to('/');
    }
}
