<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;

class Logout extends Component
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
        return redirect()->to('/login');
    }
}
