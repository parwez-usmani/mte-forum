<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;

class Permissions extends Component
{
    public $permissions, $slug, $name, $role_id;
    public function render()
    {
        $this->permissions = Permission::all();
        return view('livewire.permissions');
    }
}
