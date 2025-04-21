@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">

        <form action="/menus" method="POST">
            @csrf
            <div class="card-body">
                <x-form.input name="name" placeholder="name" label="Name" />
                <x-form.input name="icon" placeholder="icon" label="Icon" />
                <x-form.input name="route" placeholder="route" label="route" />
                <x-form.input name="permission" placeholder="permission" label="permission" />
                <div class="mb-3">
                    <label class="form-label mb-1">Permission</label>
                    <select class="form-control select2" name="permission" id="select-category" style="width: 100%;"
                        required>
                        <strong class="select2-results__group">Alaskan/Hawaiian Time Zone</strong>
                        <option value="">Select</option>
                        @foreach ($permissions as $permission)
                            <optgroup label="{{ $permission->name }}">
                                @forelse ($permission->children as $child)
                                    <option value="{{ $child->name }}">{{ $child->name }}</option>
                                @empty
                                    <option>-</option>
                                @endforelse
                            </optgroup>
                        @endforeach
                    </select>
                    @error('permission')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <x-form.input type="number" name="order" placeholder="order" label="order" />
                <div class="mb-3">
                    <label class="form-label">is_active</label>
                    <div class="d-flex gap-2">
                            <div class="">
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="true"
                                        class="form-check-input">
                                    <label class="form-check-label">true</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="true"
                                        class="form-check-input">
                                    <label class="form-check-label">false</label>
                                </div>
                            </div>
                    </div>
                    @error('permissions')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <p>
                    
                </p>
                <x-form.input name="type" placeholder="type" label="type" />
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="/menus" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
@push('script')
    <script src="{{ asset('backend') }}/dist/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="{{ asset('backend') }}/dist/libs/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/dist/js/forms/select2.init.js"></script>
    <script src="{{ asset('backend') }}/dist/libs/prismjs/prism.js"></script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/prismjs/themes/prism-okaidia.min.css">

    <!-- --------------------------------------------------- -->
    <!-- Select2 -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/select2/dist/css/select2.min.css">
@endpush
