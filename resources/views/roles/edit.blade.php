@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">

        <form action="/roles/{{ $role->id }}" method="POST">
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

            <div class="mb-3">
                <label class="form-label">Permissions</label>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <label class="card-title fs-3 mb-1">{{ $permission->name }}</label>

                        @forelse ($permission->children as $child)
                            <div class="col-md-2 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $child->name }}"
                                        class="form-check-input"
                                        {{ $role->hasPermissionTo($child->name) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $child->name }}</label>
                                </div>
                            </div>
                            @empty
                            -
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
