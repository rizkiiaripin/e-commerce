<section class="datatables">
    <x-alert></x-alert>
    <div class="card">
        <div class="card-body">

            <div class="mb-2">
                <div class="d-flex align-items-end flex-column mb-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" wire:click="create()">
                        + Create
                    </button>
                </div>
                <div class="table-responsive m-t-40">
                    <table  class="table border display table-bordered   overflow-x-auto">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $blog->image) }}" class="" width="80" />
                                    </td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->description }}</td>
                                    <td class="no-wrap"><button wire:click="edit({{$blog->id}})" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                            class="btn btn-warning btn-sm waves-effect waves-light">
                                            <i class="ti ti-edit "></i>
                                    </button>
                                        </button>
                                        
                                            <button type="submit" wire:click= "delete({{ $blog->id }})" 
                                                class="btn btn-danger btn-sm waves-effect waves-light">
                                                <i class="ti ti-trash "></i>
                                            </button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>


        <!-- Modal -->
        @include('livewire.modal')

</section>
