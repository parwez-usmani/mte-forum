<main id="main" class="main">
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

    @if($updateMode)
        @include('livewire.users.update')
    @else

            @include('livewire.users.create')
      
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
              
                <th>No.</th>
           
             
                <th>UserName</th>
               
                <th>Email</th>
                <th>Role</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->usernames }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->role_name }}</td>
                <td>
                    <button wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </main>
