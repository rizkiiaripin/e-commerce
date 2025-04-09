@extends('layouts.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>

    <section class="datatables">
        <div class="card">
            <div class="card-body">

                <div class="mb-2">
                    <div class="d-flex align-items-end flex-column mb-2">
                        <a href="/galleries/create"><button class="btn btn-primary"> <i class="ti ti-plus "></i>
                                Create</button>
                        </a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table border display table-bordered   overflow-x-auto">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>
                                        <a data-bs-toggle="modal" data-bs-target="#imageModal">
                                            <img src="" alt="image-galleries" width="80">
                                        </a>
                                    </td>
                                    <td>hahaha</td>
                                    <td class="no-wrap"><a href=""
                                            class="btn btn-warning btn-sm waves-effect waves-light">
                                            <i class="ti ti-edit "></i>
                                        </a>
                                        </button>
                                        <form action="" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" onclick="deleteItem(event)"
                                                class="btn btn-danger btn-sm waves-effect waves-light">
                                                <i class="ti ti-trash "></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel">
                                                    haha</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex justify-content-center">
                                                <img src="" alt="img-gallery" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ----------------
                                                end DataTable
                                                 ---------------- -->
    </section>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <!-- datatable -->
        <script src="{{ asset('backend') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/dist/js/datatable/datatable-basic.init.js"></script>
    @endpush
    @push('style')
        <!-- --------------------------------------------------- -->
        <!-- Datatable -->
        <!-- --------------------------------------------------- -->
        <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    @endpush
@endsection
