@props(['class', 'background_color', 'text_color', 'view', 'start', 'sort_up', 'sort_down', 'edit', 'delete'])

<li class="list-group-item d-flex justify-content-between align-items-start {{ $class ?? '' }} {{ isset($background_color) ? 'bg-' . $background_color : '' }} {{ isset($text_color) ? 'text-' . $text_color : '' }}"
    @dblclick="{{ !empty($view) ? '$wire.' . $view : (!empty($edit) ? '$wire.' . $edit : '') }}">
    <div class="me-auto my-1 text-truncate">{{ $slot }}</div>
    @if (!empty($view))
        <a href="{{ $view }}" class="btn btn-light border-black ms-1"><i class="fa-solid fa-fw fa-eye"></i> <span class="d-none d-md-inline">{{ __('bootstrap::ui.view') }}</span></a>
    @endif
    @if (!empty($start))
        <a href="{{ $start }}" class="btn btn-primary border-black ms-1"><i class="fa-solid fa-fw fa-play"></i> <span class="d-none d-md-inline">{{ __('bootstrap::ui.start') }}</span></a>
    @endif
    @if (!empty($sort_up))
        <button type="button" wire:click="{{ $sort_up }}" class="btn btn-outline-primary ms-1"><i class="fa-solid fa-fw fa-arrow-up"></i></button>
    @endif
    @if (!empty($sort_down))
        <button type="button" wire:click="{{ $sort_down }}" class="btn btn-outline-primary ms-1"><i class="fa-solid fa-fw fa-arrow-down"></i></button>
    @endif
    @if (!empty($edit))
        <button type="button" wire:click="{{ $edit }}" class="btn btn-dark border-black ms-1"><i class="fa-solid fa-fw fa-pencil"></i> <span class="d-none d-md-inline">{{ __('bootstrap::ui.edit') }}</span></button>
    @endif
    @if (!empty($delete))
        <button type="button" wire:click="{{ $delete }}" class="btn btn-danger border-black ms-1" wire:confirm="{{ __('bootstrap::ui.confirm_delete') }}"><i class="fa-solid fa-fw fa-trash-can"></i> <span class="d-none d-md-inline">{{ __('bootstrap::ui.delete') }}</span></button>
    @endif
</li>
