@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">

        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('put')
            <x-form.input name="name" value="{{ $user->name }}" placeholder="name" label="Name" />
            <x-form.input name="email" value="{{ $user->email }}" type="email" placeholder="email" label="Email" />
            <div class="mb-3">
                <label class="form-label mb-1">Role</label>
                <select class="form-control select2" name="role" id="select-category" style="width: 100%;" required>
                    <option value="">Select</option>
                    @foreach ($roles as $role)
                    @foreach ($user->roles as $userRole)
    
                            <option value="{{ $role->name }}" {{ $role->name ===  $userRole->name ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
                @error('role')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <x-form.input name="current_password" type="password"  placeholder="current password" label="Current Password" />
            <x-form.input name="password" type="password" placeholder="new password" label="New Password" />

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
