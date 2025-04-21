@extends('layouts.app')

@section('content')
    @push('style')
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @endpush

    <x-breadcrumb />
    <div id="container"></div>

    <div class="d-flex align-items-end justify-content-end gap-2 title-part-padding  mb-2">
        <button onclick="refresh()" class="btn btn-dark"> <i class="ti ti-refresh fs-5 "></i> </button>
        <a href="/menu/create">
            <button class="btn btn-primary "><i class="ti ti-plus"></i> Create</button>
        </a>
    </div>

    <ul id="sortable" class="list-unstyled ">

    </ul>
@endsection

@push('script')
    <script src="{{ asset('template/back') }}/dist/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('template/back') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script>
        function alert(response) {
            let messageOutput = '';
            if (response.success) {
                messageOutput = `<div class="alert alert-info alert-dismissible fade show" role="alert"id="alert" >
                                        ${response.message}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`;
            } else {
                messageOutput = 'Gagal memperbarui posisi.';
            }
    
            $('#container').html(messageOutput);
            setTimeout(() => {
                $('#alert').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 1000);
        }
        function index() {
            $.ajax({
                url: '{{ route('menu.data') }}',
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        let menus = response.menus;
                        let output = '';

                        menus.forEach(function(menu) {
                            output += `
                            <li class="card mb-2 p-lg-2" data-id="${menu.id}">
                                <div class="row align-items-center justify-content-evenly">
                                    <div class="col-md-9 align-items-center  gap-2 d-flex ">
                                        <span class="fs-10">
                                          <i class="ti ti-air-conditioning-disabled"></i>
                                        </span>
                                        <h4> ${menu.name}</h4>
                                    </div><div class="col-lg-1 align-items-center justify-content-center gap-2 mb-2" style="cursor: pointer;"">
            
                                            <a href="/menus/edit/${menu.id}"
                                                class="btn btn-warning btn-sm waves-effect waves-light">
                                                <i class="ti ti-edit "></i>
                                            </a>
                                            <form action="/permissions/${menu.id}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="deleteItem(event)"
                                                    class="btn btn-danger btn-sm waves-effect waves-light">
                                                    <i class="ti ti-trash "></i>
                                                </button>
                                            </form>
                                        
                                    </div>
                                </div>
                            </li>`;
                        });

                        $('#sortable').html(output);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Gagal mengambil data:', error);
                }
            });
        }

        $(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    let orders = [];

                    $('#sortable li').each(function(index) {
                        orders.push($(this).data('id'));
                    });

                    $.ajax({
                        url: '{{ route('menu.update_order') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            orders: orders
                        },
                        success: function(response) {

                            console.log('Posisi berhasil diperbarui.');
                            index();
                            alert(response)
                        },
                        error: function(xhr, status, error) {
                            console.error('Gagal memperbarui posisi:', error);
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            index();
        });
        function refresh() {
            window.location.reload();
        }
    </script>
@endpush
