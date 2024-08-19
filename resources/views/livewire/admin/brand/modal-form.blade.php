<div wire:ignore.self class="modal fade" id="addBrandsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
          <button type="button" wire:click='closeModal'  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent='storeBrands()'>
        <div class="modal-body">
          <div class="mb-3">
            <label for="">Select Category</label>
            <select wire:model.defer='category_id' class="form-control text-dark">
              <option value="">Select Category</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              
            </select>
            @error('category_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="md-3">
            <label for="">Brand Name</label>
            <input type="text" wire:model.defer='name' class="form-control border border-dark">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
          </div>
          <div class="md-3">
            <label for="">Slug</label>
            <input type="text" wire:model.defer='slug' class="form-control border border-dark">
            @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="md-3">
            <label for="">Status</label>
            <input type="checkbox" wire:model.defer='status' /> Checked = Hidden Un-Checked = Visible
            @error('status')
                <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

{{-- update modal --}}

  <div wire:ignore.self class="modal fade" id="editBrandsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Brands</h1>
          <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>Loading...
        </div>
        <div wire:loading.remove>
        <form wire:submit.prevent='updateBrands()'>
        <div class="modal-body">
          <div class="mb-3">
            <label for="">Select Category</label>
            <select wire:model.defer='category_id' class="form-control text-dark">
              <option value="">Select Category</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              
            </select>
            @error('category_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
          </div> 
          <div class="md-3">
            <label for="">Brand Name</label>
            <input type="text" wire:model.defer='name' class="form-control border border-dark">
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
          </div>
          <div class="md-3">
            <label for="">Slug</label>
            <input type="text" wire:model.defer='slug' class="form-control border border-dark">
            @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="md-3">
            <label for="">Status</label>
            <input type="checkbox" wire:model.defer='status' /> Checked = Hidden Un-Checked = Visible
            @error('status')
                <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
      </div>
    </div>
  </div>


{{-- delete modal --}}
  <div wire:ignore.self class="modal fade" id="deleteBrandsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brands</h1>
          <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading class="p-2">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>Loading...
        </div>
        <div wire:loading.remove>
        <form wire:submit.prevent='destroyBrand()'>
        <div class="modal-body">
         <h6>Are you sure you want to delete this data?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
  </div>
      </div>
    </div>
  </div>