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
                                <th>Name</th>
                                <th>Guard</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>
                                    index
                                </td>
                                <td>web</td>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
</section>
