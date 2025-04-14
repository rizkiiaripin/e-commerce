@extends('layouts.app')

@section('content')
    <x-breadcrumb></x-breadcrumb>
    <div class="container">

        <form action="/permissions" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="mb-3">
                        <label for="permission" class="form-label">Parent Permission Name</label>
                        <div class="d-flex gap-2">
                            <input type="name" name="parent_name" class="form-control  @error('name') is-invalid @enderror"
                                id="permission" placeholder="please enter permission..." required>
                            
                        </div>

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="permission" class="form-label">Sub Permission Name</label>
                        <div class="d-flex gap-2">
                            <input type="name" name="sub_permissions[]"
                                class="form-control  @error('name') is-invalid @enderror" id="permission"
                                placeholder="please enter permission..." required>
                            <button onclick="education_fields();"
                                class="
                          btn rounded 
                          btn-success
                          font-weight-medium
                          waves-effect waves-light
                        "
                                type="button">
                                <i class="ti ti-circle-plus fs-5"></i>
                            </button>
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div id="education_fields" class="mb-3"></div>

            <button type="submit" class="btn btn-primary">Create Permission</button>
            <a href="/permissions" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
@push('script')
    {{-- <script src="{{ asset('backend') }}/dist/libs/jquery.repeater/jquery.repeater.min.js"></script> --}}
    <script>
        var room = 1;

        function education_fields() {
            room++;
            var objTo = document.getElementById("education_fields");
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "mb-3 removeclass" + room);
            var rdiv = "removeclass" + room;
            divtest.innerHTML =

                '<label class="form-label">Sub Permission Name</label><div class="d-flex gap-2"> <input type="text" name="sub_permissions[]" id="" class="form-control" placeholder="please enter permission..." required> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' +
                room + ');"> <i class="ti ti-minus"></i> </button> </div></div>';

            objTo.appendChild(divtest);
        }

        function remove_education_fields(rid) {
            $(".removeclass" + rid).remove();
        }
    </script>
@endpush
