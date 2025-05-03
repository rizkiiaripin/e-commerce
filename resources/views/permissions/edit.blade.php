@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">

        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @method('put')
            @csrf
            <div class="card-body">
                <div id="education_fields" class="my-4"></div>
                <div class="row">
                    <x-form.input name="permission_name" value="{{ $permission->name }}" placeholder="permission name"
                        label="Permission Name" />

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Permission</button>
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
