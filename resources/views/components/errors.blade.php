@if (isset($errors) && $errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fa-solid fa-triangle-exclamation"></i> {{ __('Het formulier is nog niet verstuurd!') }}</strong><br>
        {{ __('Controleer onderstaande verplichte velden.') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="{{ __('Sluiten') }}"></button>
        @foreach ($errors->getBags() as $bag)
            @foreach ($bag->keys() as $field)
                <!-- {{ $field }} has an error {{ $bag->first($field) }} -->
            @endforeach
        @endforeach
    </div>
@endif
