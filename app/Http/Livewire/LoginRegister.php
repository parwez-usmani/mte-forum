<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class LoginRegister extends Component
{
    public $users, $roles,$usernames, $role_id,$email, $password, $terms,$name, $rememberM;
    public $registerForm = false;

    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.login-register');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->usernames = '';
        $this->password = '';
        $this->terms = '';
        $this->rememberM = '';
        $this->role_id = '';
    }
    public function login()
    {
        // dd("login");
        $validatedDate = $this->validate([
            'password' => 'required',
            'usernames' => 'required',
        ]);

        if(Auth::attempt(array('usernames' => $this->usernames, 'password' => $this->password))){
            session()->flash('message', "You are Loggedin successfully.");
            return redirect()->to('/dashboard');
        }else{
            session()->flash('error', 'username and password are wrong.');
        }
        $this->resetInputFields();
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
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

        session()->flash('message', 'Your register successfully Go to the login page.');
        $this->resetInputFields();

    }
}
