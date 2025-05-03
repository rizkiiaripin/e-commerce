@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <x-form.input name="name" placeholder="name" label="Name" />
            <x-form.input name="username" placeholder="username" label="Username" />
            <x-form.input name="email" type="email" placeholder="email" label="Email" />
            <x-form.input name="password" type="password" placeholder="password" label="Password" />
            <div class="mb-3">
                <label class="form-label mb-1">Role</label>
                <select class="form-control select2" name="role" id="select-category" style="width: 100%;" required>
                    <option value="">Select</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
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
    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("togglePassword");
            if (x.type === "password") {
                x.type = "text";
                y.classList.remove("fa-eye");
                y.classList.add("fa-eye-slash");
            } else {
                x.type = "password";
                y.classList.remove("fa-eye-slash");
                y.classList.add("fa-eye");
            }
        }
    </script>
@endpush
