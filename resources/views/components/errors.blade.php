@if (isset($errors) && $errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fa-solid fa-triangle-exclamation"></i> {{ __('bootstrap::ui.form_not_submitted') }}</strong><br>
        {{ __('bootstrap::ui.check_required_fields') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('bootstrap::ui.close') }}"></button>
        @foreach ($errors->getBags() as $bag)
            @foreach ($bag->keys() as $field)
                <!-- {{ $field }} has an error {{ $bag->first($field) }} -->
            @endforeach
        @endforeach
    </div>
@endif
