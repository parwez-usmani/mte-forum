<form class="row g-3">
    <input type="hidden" wire:model="categories_id">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <div class="row">
                <label for="category_name">Category name</label>
                <input type="text" wire:model="category_name" class="form-control" id="category_name" placeholder="Role Name" value="{{ old('category_name') }}">
                {{-- <input type="text" wire:model="name" class="form-control" id="yourName"> --}}
                @error('category_name') <span class="text-danger">{{ $message }}</span>@enderror
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

