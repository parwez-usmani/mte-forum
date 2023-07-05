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
        @include('roles::update')
    @else

        @include('roles::create')

    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>RoleName</th>
                <th>RoleSlug</th>
                <th>Permissions</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->role_name }}</td>
                <td>{{ $role->role_slug }}</td>
                <td>
                    @foreach ($role->permissions as $keyp => $rolep)
                        <span class="badge badge-info">
                            {{$rolep->slug}}
                        </span>
                        @endforeach
                    </td>
                <td>

                        <button wire:click="edit({{ $role->id }})" class="btn btn-primary btn-sm">Edit </button>

                    <button wire:click="delete({{ $role->id }})" class="btn btn-danger btn-sm" style="display:none">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
<style>
    .badge-info{
        --bs-bg-opacity: 1;
        background-color: rgba(var(--bs-info-rgb),var(--bs-bg-opacity)) !important;
    }
</style>
