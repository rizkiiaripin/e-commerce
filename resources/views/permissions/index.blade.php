@extends('layouts.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>
    <section class="datatables">
    <section class="datatables">
        <div class="">
            <div class="card-body">

                <div class="mb-2">
                    <div class="d-flex align-items-end flex-column mb-2">
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                            + Create
                        </a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table border display table-bordered overflow-x-auto">
                            <thead>
                                <!-- start row -->
                                <tr>
                                    <th>No</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                                <!-- end row -->
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        
                                        <td class="no-wrap">
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="btn btn-warning btn-sm waves-effect waves-light">
                                                <i class="ti ti-edit "></i>
                                            </a>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
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
    @endpush
    @push('style')
        <!-- --------------------------------------------------- -->
        <!-- Datatable -->
        <!-- --------------------------------------------------- -->
        <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    @endpush
@endsection
</div>
