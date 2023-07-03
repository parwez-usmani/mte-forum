<form class="row g-3">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <div class="row">
                <label for="category_name">Category name</label>
                    <input type="text" name="category_name" wire:model="category_name" class="form-control" id="category_name" placeholder="Category name" value="{{ old('category_name') }}">
                    {{-- <input type="text" wire:model="name" class="form-control" id="yourName"> --}}
                    @error('category_name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="row pt-4">
                <div class="col-lg-4">
                    <div class="row">
                    <button class="btn btn-primary w-10" wire:click.prevent="categorystore">Create Category</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>