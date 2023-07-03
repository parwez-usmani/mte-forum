
<main id="main" class="main">
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

    @if(Auth::user()->can('user_list'))
        Welcome: usernames (permission) <br>
    @endif
    @if(Auth::user()->hasRole('superadmin'))
        Welcome: usernames (roles)
    @endif
    {{-- @role('superadmin')
        <h4 class="m-0">Super Admin Dashboard</h4>
    @endrole --}}
<span class="badge bg-success">Approved</span>
    <h4 class="m-0"> Dashboard</h4>

  </main>