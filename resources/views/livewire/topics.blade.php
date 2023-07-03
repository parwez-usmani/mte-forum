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
        @include('livewire.topics.update')
    @elseif($showMode)
        @include('livewire.topics.show')
    @elseif($commentMode)
        @include('livewire.topics.show')
            <div class="row mt-3">
                <div class="col-lg-6"> 
                    <form>
                        <div>
                            <label for=""> Add comment:</label>
                           <input type="text" />
                            <button class="btn btn-primary btn-sm" wire:click.prevent="commentstore({{ $topics_id }})">Submit</button>
                        </div>
                        
                    </form>
                </div> 
                {{-- <div class="col-lg-6">{{$comment_description}}</div> --}}
            </div>
        
    @else
        @include('livewire.topics.create')
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Topic Name</th>
                <th>Title</th>
                <th>Topic Description</th>
                <th>Image</th>
                <th>Topic Type</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $topic)
            <tr>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->topic_name }}</td>
                <td>{{ $topic->topic_title }}</td>
                <td>{{ $topic->topic_description }}</td>
                <td> 
                    {{-- <img src="{{ asset('public/Image/'.$topic->image) }}" style="height: 100px; width: 150px;"> --}}

                    <img src="{{ asset('storage/app/photos/lock.png') }}" width="100" height="100"/>
                    {{ $topic->image }} 
                </td>
                <td>{{ $topic->topic_type }}</td>
                <td>{{ $topic->comment_description }}</td>

                <td>
          
                    <button wire:click="show({{ $topic->id }})" class="btn btn-primary btn-sm">Show </button>
                        <button wire:click="edit({{ $topic->id }})" class="btn btn-primary btn-sm">Edit </button>
                 
                    <button wire:click="delete({{ $topic->id }})" class="btn btn-danger btn-sm">Delete</button>
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