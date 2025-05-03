@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">

        <form action="{{ route('roles.store', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $role->name) }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <x-form-input></x-form-input>
            <div class="mb-3">
                <label class="form-label">Permissions</label>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="select-all">
                    <label for="select-all" class="form-check-label fw-bold">Select All</label>
                </div>

                <div class="row">
                    @foreach ($permissions as $permission)
                        <label class="card-title fs-3 mb-1">{{ $permission->name }}</label>

                        @forelse ($permission->children as $child)
                            <div class="col-md-2 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $child->name }}"
                                        class="form-check-input permission-checkbox" 
                                        {{ $role->hasPermissionTo($child->name) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $child->name }}</label>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-2 mb-2">
                                -
                            </div>
                        @endforelse
                    @endforeach
                </div>
                @error('permissions')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

@push('script')
<script>
    $('document').ready(function() {
        // Select all checkboxes when the "Select All" checkbox is checked
        $('.permission-checkbox').each(function() {
            if (this.checked) {
                $('#select-all').prop('checked', true);
            }
        });
        $('#select-all').change(function() {
            $('.permission-checkbox').prop('checked', this.checked);
        });

        // Uncheck "Select All" if any individual checkbox is unchecked
        $('.permission-checkbox').change(function() {
            if (!this.checked) {
                $('#select-all').prop('checked', false);
            }
        });
    });
</script>
@endpush
