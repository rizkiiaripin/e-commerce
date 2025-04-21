@extends('layouts.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>
        <section class="datatables">
            <div class="">
                <div class="card-body">

                    <div class="mb-2">
                        <div class="d-flex align-items-end flex-column mb-2">
                            <a href="/videos/create" class="btn btn-primary">
                                + Create
                            </a>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table border  table-bordered " style="width: 100%">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>No</th>
                                        <th>Video</th>
                                        <th>judul</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($videos as $video)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <video width="130" height="130" class="rounded" controls>
                                                    <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </td>
                                            <td>{{ $video->title }}</td>
                                            <td>{{ $video->description }}</td>

                                            <td class="no-wrap">
                                                <a href="/videos/{{ $video->slug }}/edit"
                                                    class="btn btn-warning btn-sm waves-effect waves-light">
                                                    <i class="ti ti-edit "></i>
                                                </a>
                                                <form action="/videos/{{ $video->slug }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" onclick="deleteItem(event)"
                                                        class="btn btn-danger btn-sm waves-effect waves-light">
                                                        <i class="ti ti-trash "></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


        </section>

        @push('script')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="{{ asset('js/sweetalert.js') }}"></script>
            <!-- datatable -->
            <script src="{{ asset('backend') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="{{ asset('backend') }}/dist/js/datatable/datatable-basic.init.js"></script>
            <script>
                $(document).ready(function() {
                    //destroy datatable if it exists
                    if ($.fn.DataTable.isDataTable('#config-table')) {
                        $('#config-table').DataTable().destroy();
                    }
                    $('#config-table').DataTable({
                        scrollX: true,
                        scrollCollapse: true,
                        paging: true
                    });
                });
                
            </script>
        @endpush
        @push('style')
            <!-- --------------------------------------------------- -->
            <!-- Datatable -->
            <!-- --------------------------------------------------- -->
            <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
        @endpush
    @endsection
    </div>
