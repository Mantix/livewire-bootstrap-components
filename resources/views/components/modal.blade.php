@props(['id', 'size', 'title', 'close_function' => null, 'submit_function' => null, 'submit_color' => null, 'submit_text' => null, 'submit_icon' => null, 'level' => null])

@if (!empty($submit_function))
    <form wire:submit.prevent="{{ $submit_function }}" role="form">
@endif
<div
     class="modal fade show {{ isset($level) ? 'modal-level-' . $level : '' }}"
     id="{{ $id }}"
     tabindex="-1"
     role="dialog"
     aria-labelledby="{{ $id }}_label"
     x-data="{
         init() {
             window.addEventListener('keydown', (e) => {
                 // ESC key for closing
                 if (e.key === 'Escape' && '{{ $close_function }}') {
                     @this.call('{{ $close_function }}');
                 }
             });
         }
     }">

    <div class="modal-dialog {{ isset($size) ? 'modal-' . $size : '' }} modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="{{ $id }}_label">{!! $title !!}</h4>
                @if (isset($close_function))
                    <button type="button" class="btn-close" wire:click.stop="{{ $close_function }}" aria-label="{{ __('bootstrap::ui.close') }}"></button>
                @endif
            </div>
            <div class="modal-body">
                <x-bootstrap::errors />
                {{ $slot }}
            </div>
            @if (!empty($submit_text) || !empty($submit_icon))
                <div class="modal-footer">
                    @if (isset($close_function))
                        <button type="button" class="btn btn-secondary me-auto" wire:click.stop="{{ $close_function }}">{{ __('bootstrap::ui.cancel') }}</button>
                    @endif
                    <button type="submit" class="btn btn-lg btn-{{ $submit_color ?? 'primary' }}" wire:loading.attr="disabled">
                        @if (!empty($submit_icon))
                            <i class="fa-solid fa-fw fa-{{ $submit_icon }}" wire:loading.remove></i>
                        @endif
                        <i class="fa-solid fa-fw fa-spinner fa-spin" wire:loading></i>
                        {{ $submit_text ?? '' }}
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>
@if (!empty($submit_function))
    </form>
@endif
<div class="modal-backdrop fade show {{ isset($level) ? 'modal-level-' . $level : '' }}"></div>
