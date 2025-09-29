@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 mt-3 me-3 shadow" role="alert" id="success-alert" style="z-index: 1050; min-width: 250px;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
