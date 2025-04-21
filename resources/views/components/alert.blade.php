@if (session('success'))
    <div class="alert customize-alert alert-dismissible border-success text-success fade show remove-close-icon"
        role="alert" id="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="d-flex align-items-center font-medium me-3 me-md-0">
            <i class="ti ti-info-circle fs-5 me-2 text-success"></i>
            {{ session('success') }}
        </div>
    </div>
@endif
@if (session('error'))
    <div class="alert customize-alert alert-dismissible border-danger text-danger fade show remove-close-icon"
        role="alert" id="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="d-flex align-items-center font-medium me-3 me-md-0">
            <i class="ti ti-info-circle fs-5 me-2 text-danger"></i>
            {{ session('error') }}
        </div>
    </div>
@endif

<script>
    setTimeout(() => {
        $('#alert').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 10000);
</script>
