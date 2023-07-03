<form class="row g-3">
    <input type="hidden" wire:model="topics_id">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <div class="row">
                <label for="topic_name">Topic name</label>
                <input type="text" wire:model="topic_name" class="form-control" id="topic_name" placeholder="Topic name" value="{{ old('topic_name') }}">
                {{-- <input type="text" wire:model="name" class="form-control" id="yourName"> --}}
                @error('topic_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="row mt-3">
                <label for="topic_title">Topic Title</label>
                <input type="text" name="topic_title" wire:model="topic_title" tag="topic_title" class="form-control" id="topic_title" placeholder="Topic Title" value="{{ old('topic_title') }}">
                @error('topic_title') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="row mt-3">
                <label for="topic_description">Topic Description</label>
                <input type="text" name="topic_description" wire:model="topic_description" tag="topic_description" class="form-control" id="topic_description" placeholder="Topic Description" value="{{ old('topic_description') }}">
                @error('topic_description') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="row mt-3">
                <label for="image">Image</label>
                <input type="text" name="image" wire:model="image" tag="image" class="form-control" id="image" placeholder="Role Slug" value="{{ old('image') }}">
                @error('image') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="row mt-3">
                <label for="topic_type">Topic Type</label>
                <input type="text" name="topic_type" wire:model="topic_type" tag="topic_type" class="form-control" id="topic_type" placeholder="Role Slug" value="{{ old('topic_type') }}">
                @error('topic_type') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="row mt-3">
                <label for="comment_description">Comment</label>
                <input type="text" name="comment_description" wire:model="comment_description" tag="comment_description" class="form-control" id="comment_description" placeholder="Role Slug" value="{{ old('comment_description') }}">
                @error('comment_description') <span class="text-danger">{{ $message }}</span>@enderror
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

