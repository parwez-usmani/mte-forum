<form class="row g-2"  wire:submit.prevent="topicstore" enctype="multipart/form-data">
    {{-- <div class="col-lg-12"> --}}
        <div class="col-6">
            {{-- <div class="row"> --}}
                <label for="topic_name" class="form-label">Topic name</label>
                    <input type="text" name="topic_name" wire:model="topic_name" class="form-control" id="topic_name" placeholder="Topic Name" value="{{ old('topic_name') }}">
                    {{-- <input type="text" wire:model="name" class="form-control" id="yourName"> --}}
                    @error('topic_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="row mt-3"> --}}
            <div class="col-6">
                <label for="topic_title" class="form-label">Topic Title</label>
                <input type="text" name="topic_title" wire:model="topic_title" tag="topic_title" class="form-control" id="topic_title" placeholder="Topic Title" value="{{ old('topic_title') }}">
                @error('topic_title') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="row mt-3"> --}}
            <div class="col-6">
                <label for="topic_description" class="form-label">Topic Description</label>
                <input type="text" name="topic_description" wire:model="topic_description" tag="topic_description" class="form-control" id="topic_description" placeholder="Topic Description" value="{{ old('topic_description') }}">
                @error('topic_description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="row mt-3"> --}}
            <div class="col-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" wire:model="image" tag="image" class="form-control" id="image" placeholder="Image" value="{{ old('image') }}">
                @error('image') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="row mt-3"> --}}
            <div class="col-6">
                <label for="topic_type" class="form-label">Topic Type</label>
                <input type="text" name="topic_type" wire:model="topic_type" tag="topic_type" class="form-control" id="topic_type" placeholder="Topic Type" value="{{ old('topic_type') }}">
                @error('topic_type') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="row mt-3"> --}}
            <div class="col-6">
                <label for="comment_description" class="form-label">Comment</label>
                <input type="text" name="comment_description" wire:model="comment_description" tag="comment_description" class="form-control" id="comment_description" placeholder="Comment" value="{{ old('comment_description') }}">
                @error('comment_description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
       
    {{-- </div> --}}

    <div class="row pt-4">
        <div class="col-lg-12">
            <button class="btn btn-primary w-10" style="margin-left: 43%;">Create Topic</button>
        </div>
    </div>
</form>
