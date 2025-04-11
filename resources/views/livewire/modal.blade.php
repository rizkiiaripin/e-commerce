<div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create blog</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4">
                        <form wire:submit.prevent= {{$editForm ? "update($editId)" : "store()"}}>
                            <label class="form-control-label mb-1" for="image">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror mb-2"
                                wire:model="image" id="image" name="image" {{$editForm ? '' : 'required'}}>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="form-control-label mb-1" for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror mb-2"
                                wire:model="title" id="title" name="title" placeholder="please enter title..."
                                required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="form-control-label mb-1">Categories</label>
                            <div  wire:ignore.self >
                                <select class="form-control select2" wire:model="category_id"
                                    id="select-category" style="width: 100%;">
                                    <option value="">Select</option>
                                    <option value="1">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </select>
                            </div>

                            <label class="form-control-label mb-1" for="description">Description</label>
                            <textarea class="form-control @error('name') is-invalid @enderror mb-2" id="description" name="description"
                                placeholder="please enter description..." wire:model = "description" required></textarea>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">{{$editForm ? 'update' : 'create'}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>