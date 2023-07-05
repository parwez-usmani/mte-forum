<?php

namespace App\Domain\Users\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserService extends Component
{
    public $users, $permissions, $roles, $name, $email, $usernames, $terms,$rememberM,$role_id,$password,$users_id;
    public $updateMode = false;
    public function render()
    {
        $user = Auth::user();
        // dd($user);
        $this->roles = Role::all();
        // $this->permissions = Permission::all();
        $this->users = User::all();
        return view('livewire.users');
    }
    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->usernames = '';
        $this->password = '';
        $this->terms = '';
        $this->rememberM = '';
        $this->role_id = '';
    }

    public function userstore()
    {
        $validatedDate = $this->validate([
            'name' => 'required|max:50',
            'email' => 'required|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i|unique:users,email|max:50',
            'usernames' => 'required|max:50',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*+_-]{8,}$/|max:50',
            'role_id' => 'required',
            'terms'=>'required',
        ],
            [
                'name.required' => 'Please enter your name',
                'email.required' => 'Please enter your email',
                'email.regex' => 'The email must be a valid email address.',
                'usernames.required' => 'Please enter your username',
                'password.required' => 'Please enter your password',
                'password.regex' => 'The password must be in a format(ex:Xyz@123).',
                'role_id.required' => 'Please select your role',
                'terms.required' => 'You must agree before submitting.',
            ]
        );

        $this->password = Hash::make($this->password);
        $user =  User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'usernames' => $this->usernames,
            'terms' => $this->terms,
            'role_id' => $this->role_id
        ]);
        $last_id = $user->id;

        $role_user=array(
            'role_id'=>$this->role_id,
            'user_id'=>$last_id,
        );
        DB::table('users_roles')->insert($role_user);

        $last_role = DB::table('users_roles')
            ->select("role_id")
            ->where('user_id', $last_id)->first();
        $last_role_id = $last_role->role_id;

        $permission_ids = DB::table('roles')
            ->select("permission_id")
            ->where('id', $last_role_id)->first();
        $permission_ids_id = $permission_ids->permission_id;
        $permission_array = explode(",",$permission_ids_id);
        foreach ($permission_array as $permission_id) {
            $users_permissions=array(
                'user_id'=>$last_id,
                "permission_id"=>$permission_id,
            );
            DB::table('users_permissions')->insert($users_permissions);
        }

        session()->flash('message', 'User Created successfully.');
        // return redirect()->route('login')->with('message', 'Your register successfully Go to the login page.');
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        // dd("edit");
        $user =  User::findOrFail($id);
        // $permissionId = $role->permission_id;
        // $permission_array = implode(',',(array) $role->permission_id);
        $this->users_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->usernames = $user->usernames;
        $this->terms = $user->terms;
        $this->role_id = $user->role_id;

        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        // dd($this->users_id);
        $validatedDate = $this->validate([
            'name' => 'required|max:50',
            // 'email' => 'required|max:50|regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i|email|unique:users,email'.$this->users_id,
            'email' => ['required', 'max:50', 'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/i','email', \Illuminate\Validation\Rule::unique('users')->ignore($this->users_id)],
            'usernames' => 'required|max:50',
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*+_-]{8,}$/|max:50',
            'role_id' => 'required',
            'terms'=>'required',
        ],
            [
                'name.required' => 'Please enter your name',
                'email.required' => 'Please enter your email',
                'email.regex' => 'The email must be a valid email address.',
                'usernames.required' => 'Please enter your username',
                'password.required' => 'Please enter your password',
                'password.regex' => 'The password must be in a format(ex:Xyz@123).',
                'role_id.required' => 'Please select your role',
                'terms.required' => 'You must agree before submitting.',
            ]);

        $user =  User::find($this->users_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'usernames' => $this->usernames,
            'terms' => $this->terms,
            'role_id' => $this->role_id
        ]);

        $last_user_id = $this->users_id;

        $roles_old = DB::table('users_roles')
            ->select('role_id','user_id')
            ->where('user_id', $last_user_id)
            ->first();

        if( $roles_old != 'null'){
            $delete_roles = DB::table('users_roles')->where('user_id', $last_user_id)->delete();
        }

        $role_ids_new = $this->role_id;
        $role_user=array(
            'role_id'=>$role_ids_new,
            'user_id'=>$last_user_id,
        );
        $role_user = DB::table('users_roles')->insert($role_user);

        $last_role_id = $this->role_id;
        $permission_ids = DB::table('roles')
            ->select("permission_id")
            ->where('id', $last_role_id)->first();

        if($permission_ids){
            $delete_user_permission = DB::table('users_permissions')->where('user_id', $last_user_id)->delete();
            $permission_ids_id = $permission_ids->permission_id;
            $permission_array = explode(",",$permission_ids_id);
            foreach ($permission_array as $permission_id) {
                $users_permissions=array(
                    'user_id'=>$last_user_id,
                    "permission_id"=>$permission_id,
                );
                DB::table('users_permissions')->insert($users_permissions);
            }
        }
        $this->updateMode = false;

        session()->flash('message', 'User Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        User::find($id)->delete();
        DB::table("users_roles")->where('user_id',$id)->delete();
        DB::table("users_permissions")->where('user_id',$id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
    }
}
