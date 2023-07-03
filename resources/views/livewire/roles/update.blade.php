<form class="row g-3">
    <input type="hidden" wire:model="roles_id">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <label for="role_name">Role name</label>
                    <input type="text" wire:model="role_name" class="form-control" id="role_name" placeholder="Role Name" value="{{ old('role_name') }}">
                    {{-- <input type="text" wire:model="name" class="form-control" id="yourName"> --}}
                    @error('role_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="row mt-5">
                    <label for="role_slug">Role Slug</label>
                    <input type="text" name="role_slug" wire:model="role_slug" tag="role_slug" class="form-control" id="role_slug" placeholder="Role Slug" value="{{ old('role_slug') }}">
                    @error('role_slug') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-lg-6">
                <label><strong>Select Permissions :</strong></label><br>
                @foreach ($permissions as $permission)
                    <div class="">
                        <label><input type="checkbox" name="permission_id" wire:model="permission_id.{{ $permission->id }}" value="{{$permission->id}}" />
                        {{$permission->name}}</label> 
                        {{-- <label><input type="checkbox" wire:model="permission_id.{{ $permission->id }}" value="{{$permission->id}}" @if(in_array($permission->id,$permissionId)) checked @endif/> 
                        {{$permission->name}}</label>  --}}
                    </div>           
                @endforeach
                @error('permission_id') <span class="text-danger">{{ $message }}</span>@enderror
                {{-- <h3>Selected Address ID: {{ $selectedPermissionId }}</h3> --}}
            </div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-lg-12">
            <button wire:click.prevent="update()" class="btn btn-primary w-10" style="margin-left: 43%;">Update</button>
            <button wire:click.prevent="cancel()" class="btn btn-danger w-10">Cancel</button>
        </div>
    </div> 
</form>

