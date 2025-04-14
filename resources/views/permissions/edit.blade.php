@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">

        <form action="/permissions/{{ $permission->id }}" method="POST">
            @method('put')
            @csrf
            <div class="card-body">
                <div id="education_fields" class="my-4"></div>
                <div class="row">
                    <div class="mb-3">
                        <label for="permission" class="form-label">Permission Name</label>
                        <div class="">
                            <input type="name" name="name" class="form-control  @error('name') is-invalid @enderror"
                                id="permission" placeholder="please enter permission..."
                                value="{{ old('name', $permission->name) }}" required>
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @foreach ($permission->children as $child)
                        <div class="mb-3">
                            <label for="permission" class="form-label">Sub Permission Name</label>
                            <div class="">
                                <input type="name" name="name"
                                    class="form-control  @error('name') is-invalid @enderror" id="permission"
                                    placeholder="please enter permission..." value="{{ old('name', $child->name) }}"
                                    required>
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Permission</button>
            <a href="/permissions" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
