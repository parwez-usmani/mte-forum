<?php

namespace App\Domain\Users\Services;

use App\Models\Permission;
use Livewire\Component;

class PermissionService extends Component
{
    public $permissions, $slug, $name, $role_id;
    public function render()
    {
        $this->permissions = Permission::all();
        return view('livewire.permissions');
    }
}
