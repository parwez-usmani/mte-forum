<form>
    <input type="hidden" wire:model="users_id">
    <div class="col-6">
        <label for="yourName" class="form-label">Your Name</label>
        <input type="text" wire:model="name" class="form-control" id="yourName">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="col-6">
        <label for="yourEmail" class="form-label">Your Email</label>
        <input type="email" wire:model="email" class="form-control" id="yourEmail">
        {{-- <div class="invalid-feedback">Please enter a valid Email adddress!</div> --}}
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="col-6">
        <label for="yourUsername" class="form-label">Username</label>
        <input type="text" wire:model="usernames" class="form-control" id="yourUsername">
        @error('usernames') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="col-6">
        <label for="role_id" class="form-label">Select Role</label>
        
        <select class="role form-control" name="role_id" wire:model="role_id">
            <option value="">Select Role</option>
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->role_name}}</option>
            @endforeach
        </select>
        @error('role_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="col-6">
        <label for="yourPassword" class="form-label">Password</label>
        <input type="password" wire:model="password" class="form-control" id="yourPassword">
        {{-- <div class="invalid-feedback">Please enter your password!</div> --}}
        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <button wire:click.prevent="update()" class="btn btn-primary">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>

