@props(['required' => false, 'label' => '', 'icon' => ''])

@php
    $field_idd = '';
    if (preg_match('/id="([^"]+)"/', $slot, $matches)) {
        $field_idd = $matches[1];
    } elseif (preg_match('/name="([^"]+)"/', $slot, $matches)) {
        $field_idd = $matches[1];
    }

    $model_id = null;
    if (preg_match('/wire:model(?:\.[a-zA-Z0-9_]+)*\s*=\s*["\']([^"\']+)["\']/', $slot, $matches)) {
        $model_id = $matches[1];
    }
@endphp

<div {{ $attributes->class(['form-group', 'mb-3' => strpos($attributes->get('class'), 'mb-') === false]) }}>
    @if ($required)
        <span class="float-end"><i class="fas fa-asterisk"></i></span>
    @endif
    @if ($label)
        <label class="form-label fw-bold" for="{{ $field_idd }}">{!! $label !!}</label>
    @endif
    <div class="{{ $icon ? 'input-group' : '' }}">
        @if ($icon)
            <span class="input-group-text"><i class="fas fa-fw fa-{{ $icon }}"></i></span>
        @endif
        {{ $slot }}
    </div>
</div>

@if ($model_id)
    @error($model_id)
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong><i class="fa-solid fa-triangle-exclamation"></i></strong> {{ $message }}
        </div>
    @enderror
@endif
