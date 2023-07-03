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
        @include('livewire.categories.update')
    @else

        @include('livewire.categories.create')

    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
       
           @foreach($categories as $category)
           <tr>
               <td>{{ $category->id }}</td>
               <td>{{ $category->category_name }}</td>
               <td>
         
                    <button wire:click="edit({{ $category->id }})" class="btn btn-primary btn-sm">Edit </button>
                
                   <button wire:click="delete({{ $category->id }})" class="btn btn-danger btn-sm">Delete</button>
               </td>
           </tr>
           @endforeach
        </tbody>
    </table>
</main>
