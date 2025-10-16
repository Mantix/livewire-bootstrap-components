@if (session()->has('message'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong><i class="fa-solid fa-info"></i> {{ __('bootstrap::ui.for_your_information') }}:</strong> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('bootstrap::ui.close') }}"></button>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fa-solid fa-check"></i> {{ __('bootstrap::ui.success') }}</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('bootstrap::ui.close') }}"></button>
    </div>
@endif

@if (session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fa-solid fa-triangle-exclamation"></i> {{ __('bootstrap::ui.error') }}</strong> {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('bootstrap::ui.close') }}"></button>
    </div>
@endif

<x-bootstrap::errors />
