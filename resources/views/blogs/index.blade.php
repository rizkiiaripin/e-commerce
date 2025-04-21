@extends('layouts.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>
    <section class="datatables">
        <x-alert></x-alert>
        <div class="card">
            <div class="card-body">

                <div class="mb-2">
                    <div class="d-flex align-items-end flex-column mb-2">
                        <button type="button" class="btn btn-primary" data-bs-target="#staticBackdrop"
                            onclick="resetFormForCreate()">
                            + Create
                        </button>
                    </div>
                    <div  class="table-responsive m-t-40">
                        <table id="config-table" class="table border display table-bordered   overflow-x-auto">
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
                            <tbody id="table-body">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" >
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create blog</h1>
                            <button type="button" class="btn-close" onclick="hideModal()" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-4">
                            <form id="form" enctype="multipart/form-data" onsubmit="actionForm(event)">
                                <x-form.input label="Image" name="image" id="image" type="file"></x-form.input>
                                <x-form.input label="title" name="title" id="title" ></x-form.input>
                                <div class="mb-3">
                                    <label class="form-label">Categories</label>
                                    <div >
                                        <select class="form-control select2"  id="select-category"
                                            style="width: 100%;">
                                            <option value="">Select Category</option>
                                        </select>
                                    </div>
                                </div>
                                <x-form.textarea label="Description" id="description" name="description" placeholder="description"></x-form.textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="hideModal()">Close</button>
                            <button type="submit" class="btn btn-primary" id="submit">create</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

    </section>
    @push('script')
        <!-- datatable -->
        <script src="{{ asset('backend') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/dist/js/datatable/datatable-basic.init.js"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <!-- ---------------------------------------------- -->
        <!-- Select2 -->
        <!-- ---------------------------------------------- -->
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    dropdownParent: $('#staticBackdrop') // agar dropdown muncul di dalam modal
                });
            });
        </script>
        <script>
            function showModal() {
                
                $('#staticBackdrop').modal('show');
            }
            function hideModal() {
                $('#staticBackdrop').modal('hide');
            }
        </script>
        <script src="{{ asset('js/ajax/blog.js') }}"></script>
        <script src="{{ asset('backend') }}/dist/libs/select2/dist/js/select2.full.min.js"></script>
        <script src="{{ asset('backend') }}/dist/libs/select2/dist/js/select2.min.js"></script>
        <script src="{{ asset('backend') }}/dist/js/forms/select2.init.js"></script>
        <script src="{{ asset('backend') }}/dist/libs/prismjs/prism.js"></script>
        @livewireScripts
    @endpush
    @push('style')
        <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/prismjs/themes/prism-okaidia.min.css">

        <!-- --------------------------------------------------- -->
        <!-- Select2 -->
        <!-- --------------------------------------------------- -->
        <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/select2/dist/css/select2.min.css">
        <!-- --------------------------------------------------- -->
        <!-- Datatable -->
        <!-- --------------------------------------------------- -->
        <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    @endpush
@endsection
