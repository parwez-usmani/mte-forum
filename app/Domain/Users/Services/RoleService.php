<?php

namespace App\Domain\Users\Services;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RoleService extends Component
{
    public $roles,$roless, $permissions, $role_name, $role_slug, $permission_id, $role_id, $roles_id;
    public $updateMode = false;

    // public $roless = Role::all();
    public $selectedPermissionId;

    public function mount(): void
    {
        $this->roless = Role::all();
        $this->selectedPermissionId = 1;
    }

    public function render()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
        return view('livewire.roles');
    }
    private function resetInputFields(): void
    {
        $this->role_name = '';
        $this->role_slug = '';
        $this->permission_id = '';
    }
    public function rolestore(): void
    {
        // dd($this->permission_id);
        $validatedDate = $this->validate([
            'role_name' => 'required|max:20',
            'role_slug' => 'required|max:20',
            'permission_id' => 'required',
        ],
        [
            'role_name.required' => 'Please enter role name.',
            'role_slug.required' => 'Please enter slug name.',
            'permission_id.required' => 'Please select permission for role.',

        ]);

        $Id_array = implode(',',$this->permission_id);
        $role_slug_lower = strtolower($this->role_name);
        $role = Role::create([
            'role_name' => $this->role_name,
            'role_slug' => $role_slug_lower,
            'permission_id' => $Id_array,
        ]);
        $last_id = $role->id;

        $permission_ids = $this->permission_id;

        // dd( $permission_ids);
            foreach ($permission_ids as $permission_id) {
                $role_user=array(
                    'role_id'=>$last_id,
                    "permission_id"=>$permission_id,
                );
                DB::table('roles_permissions')->insert($role_user);
            }

        session()->flash('message', 'Your register successfully Go to the login page.');
        $this->resetInputFields();
    }
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id): void
    {
        $role = Role::findOrFail($id);
        $permissionId = $role->permission_id;
        $permission_array = implode(',',(array) $role->permission_id);
        $this->roles_id = $id;
        $this->role_name = $role->role_name;
        $this->role_slug = $role->role_slug;
        $this->permission_id = $role->permission_id;

        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @return void
     */
    public function cancel(): void
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @return void
     */
    public function update(): void
    {
        $validatedDate = $this->validate([
            'role_name' => 'required|max:20',
            'role_slug' => 'required|max:20',
            'permission_id' => 'required',
        ],
        [
            'role_name.required' => 'Please enter role name.',
            'role_slug.required' => 'Please enter slug name.',
            'permission_id.required' => 'Please select permission for role.',

        ]);

        $role = Role::find($this->roles_id);
        $Id_array = implode(',',(array) $this->permission_id);
        $role_slug_lower = strtolower($this->role_name);
        $role->update([
            'role_name' => $this->role_name,
            'role_slug' =>  $role_slug_lower,
            'permission_id' => $Id_array,
        ]);

        $last_role_id = $this->roles_id;

        $roles_permissions_old = DB::table('roles_permissions')
        ->select('role_id','permission_id')
        ->where('role_id', $last_role_id)
        ->first();

        if( $roles_permissions_old != 'null'){
            $delete_roles = DB::table('roles_permissions')->where('role_id', $last_role_id)->delete();
        }

            $permission_ids = $this->permission_id;

            foreach ($permission_ids as $permission_id) {
                // echo"<pre>";print_r($permission_id);
                $role_user=array(
                    'role_id'=>$last_role_id,
                    "permission_id"=>$permission_id,
                );
            DB::table('roles_permissions')->insert($role_user);

            }

        $this->updateMode = false;

        session()->flash('message', 'Role Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id): void
    {
        Role::find($id)->delete();
        DB::table("roles_permissions")->where('role_id',$id)->delete();
        session()->flash('message', 'Role Deleted Successfully.');
    }
}
