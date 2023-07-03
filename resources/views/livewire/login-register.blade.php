<div>
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    @if($registerForm)
    <form class="row g-3">
        <div class="col-12">
            <label for="yourName" class="form-label">Your Name</label>
            <input type="text" wire:model="name" class="form-control" id="yourName">
            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-12">
            <label for="yourEmail" class="form-label">Your Email</label>
            <input type="email" wire:model="email" class="form-control" id="yourEmail">
            {{-- <div class="invalid-feedback">Please enter a valid Email adddress!</div> --}}
            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-12">
            <label for="yourUsername" class="form-label">Username</label>
            <input type="text" wire:model="usernames" class="form-control" id="yourUsername">
            @error('usernames') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-12">
            <label for="role_id" class="form-label">Select Role</label>
            
            <select class="role form-control" name="role_id" wire:model="role_id">
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                    @endforeach
            </select>
            @error('role_id') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="col-12">
            <label for="yourPassword" class="form-label">Password</label>
            <input type="password" wire:model="password" class="form-control" id="yourPassword">
            {{-- <div class="invalid-feedback">Please enter your password!</div> --}}
            @error('password') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
    
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" wire:model="terms"  name="terms" type="checkbox" value="1" id="acceptTerms">
                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                @error('terms') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100" wire:click.prevent="registerStore">Create Account</button>
        </div>
        <div class="col-12">
            <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
        </div>
    </form>
    @else
        <form>
            <div class="row g-3">
                <div class="col-12">
                    <div class="form-group">
                        <label for="yourUsername" class="form-label">Username</label>
                        <input type="text" wire:model="usernames" name="usernames" class="form-control" id="yourUsername">
                        @error('usernames') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" name="password" wire:model="password" class="form-control">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" wire:model="rememberM" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" wire:click.prevent="login">Login</button>
                </div>

                <div class="col-12">
                    <p class="small mb-0">Don't have account? <a class="btn btn-primary text-white" wire:click.prevent="register">Create an account</a></p>
                </div>
            </div>
        </form>
    @endif
</div>