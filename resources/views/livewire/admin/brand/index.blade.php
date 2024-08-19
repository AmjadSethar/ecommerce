<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Brands List
                        <a href="" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandsModal">Add Brands</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Category</td>
                                <td>Slug</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>
                                    @if ($brand->category)
                                    {{$brand->category->name}}
                                    @else 
                                    No Category   
                                    @endif
                                    
                                </td>
                                <td>{{$brand->slug}}</td>
                                <td>{{$brand->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                <td>
                                    <a href="#" wire:click='editBrands({{$brand->id}})' data-bs-toggle="modal" data-bs-target="#editBrandsModal" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" wire:click='deleteBrands({{$brand->id}})' data-bs-toggle="modal" data-bs-target="#deleteBrandsModal" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>    
                            @empty
                                <tr>
                                    <td colspan="5">No Brands Found</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                    <div class="my-2">
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal',event =>{
            $('#addBrandsModal').modal('hide')
            $('#editBrandsModal').modal('hide')
            $('#deleteBrandsModal').modal('hide')
        });
    </script>
@endpush