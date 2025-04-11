@extends('layouts.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>
    @livewire('blogs')
    @push('script')
        <!-- datatable -->
        <script src="{{ asset('backend') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/dist/js/datatable/datatable-basic.init.js"></script>

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
