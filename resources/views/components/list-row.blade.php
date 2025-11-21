@props(['class', 'background_color', 'text_color', 'narrow' => false, 'actions' => []])

@php
    $actions = is_array($actions) ? $actions : [];
    $dblclickAction = collect($actions)->first(function ($action) {
        return isset($action['wire:click']) && $action['color'] == 'primary';
    });
    $dblclickValue = $dblclickAction ? '$wire.' . $dblclickAction['wire:click'] : '';
    $dropdownId = 'listRowActions' . uniqid();
@endphp

<li class="list-group-item d-flex justify-content-between align-items-start {{ $class ?? '' }} {{ isset($background_color) ? 'bg-' . $background_color : '' }} {{ isset($text_color) ? 'text-' . $text_color : '' }}"
    @if (!empty($dblclickValue)) @dblclick="{{ $dblclickValue }}" @endif>
    <div class="me-auto my-1 text-truncate">{{ $slot }}</div>

    @if (!empty($actions))
        {{-- Desktop: Button Group --}}
        <div class="btn-group d-none d-md-flex ms-1" role="group">
            @foreach ($actions as $action)
                @php
                    $color = $action['color'] ?? 'light';
                    $icon = $action['icon'] ?? 'circle';
                    $label = $action['label'] ?? '';
                    $hasHref = isset($action['href']);
                    $hasWireClick = isset($action['wire:click']);
                    $confirm = $action['confirm'] ?? null;
                @endphp

                @if ($hasHref)
                    <a href="{{ $action['href'] }}" {{ isset($action['target']) ? 'target="' . $action['target'] . '"' : '' }} class="btn btn-{{ $color }}" title="{{ $label }}">
                        <i class="fa-solid fa-fw fa-{{ $icon }}"></i>
                        @if (!$narrow && !empty($label))
                            <span>{{ $label }}</span>
                        @endif
                    </a>
                @elseif($hasWireClick)
                    <button type="button"
                            wire:click.stop="{{ $action['wire:click'] }}"
                            class="btn btn-{{ $color }}"
                            @if ($confirm) wire:confirm="{{ $confirm }}" @endif
                            title="{{ $label }}">
                        <i class="fa-solid fa-fw fa-{{ $icon }}"></i>
                        @if (!$narrow && !empty($label))
                            <span>{{ $label }}</span>
                        @endif
                    </button>
                @endif
            @endforeach
        </div>

        {{-- Mobile: Dropdown Menu --}}
        <div class="dropdown d-md-none ms-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="{{ $dropdownId }}" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-fw fa-ellipsis-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="{{ $dropdownId }}">
                @foreach ($actions as $action)
                    @php
                        $icon = $action['icon'] ?? 'circle';
                        $label = $action['label'] ?? '';
                        $hasHref = isset($action['href']);
                        $hasWireClick = isset($action['wire:click']);
                        $confirm = $action['confirm'] ?? null;
                    @endphp

                    <li>
                        @if ($hasHref)
                            <a href="{{ $action['href'] }}" {{ isset($action['target']) ? 'target="' . $action['target'] . '"' : '' }} class="dropdown-item">
                                <i class="fa-solid fa-fw fa-{{ $icon }}"></i>
                                @if (!empty($label))
                                    <span class="ms-2">{{ $label }}</span>
                                @endif
                            </a>
                        @elseif($hasWireClick)
                            <button type="button"
                                    class="dropdown-item"
                                    wire:click.stop="{{ $action['wire:click'] }}"
                                    @if ($confirm) wire:confirm="{{ $confirm }}" @endif>
                                <i class="fa-solid fa-fw fa-{{ $icon }}"></i>
                                @if (!empty($label))
                                    <span class="ms-2">{{ $label }}</span>
                                @endif
                            </button>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</li>
