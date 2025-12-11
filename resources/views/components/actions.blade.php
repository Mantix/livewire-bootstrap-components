@props(['actions' => [], 'narrow' => false, 'idPrefix' => null, 'class' => null])

@php
    // Normalize and enrich action definitions
    $actions = is_array($actions) ? $actions : [];
    $unique_id = $idPrefix ?? uniqid();
    foreach ($actions as $action_key => $action) {
        $actions[$action_key]['key'] = $unique_id . '_' . $action_key;
        $actions[$action_key]['color'] = $action['color'] ?? 'light';
        $actions[$action_key]['icon'] = $action['icon'] ?? 'circle';
        $actions[$action_key]['label'] = $action['label'] ?? '';
    }

    // Select the primary action (if any)
    $primary_action = collect($actions)->first(function ($action) {
        return $action['color'] == 'primary';
    });

    $dropdown_id = 'actions_dropdown_' . $unique_id;
@endphp

@if (!empty($actions))
    <div class="d-flex align-items-center {{ $class }}">
        @if (count($actions) == 1)
            {{-- Single action: render directly --}}
            @foreach ($actions as $action)
                @if (!empty($action['href']))
                    <a href="{{ $action['href'] }}" {{ !empty($action['target']) ? 'target="' . $action['target'] . '"' : '' }} id="{{ $action['key'] }}" class="btn btn-{{ $action['color'] }}" title="{{ $action['label'] }}">
                        <i class="fa-solid fa-fw fa-{{ $action['icon'] }}"></i>
                        @if (!$narrow && !empty($action['label']))
                            <span class="d-none d-md-inline">{{ $action['label'] }}</span>
                        @endif
                    </a>
                @elseif(!empty($action['wire:click']))
                    <button type="button" wire:click.stop="{{ $action['wire:click'] }}" id="{{ $action['key'] }}" class="btn btn-{{ $action['color'] }}" @if (!empty($action['wire:confirm'])) wire:confirm="{{ $action['wire:confirm'] }}" @endif title="{{ $action['label'] }}">
                        <i class="fa-solid fa-fw fa-{{ $action['icon'] }}"></i>
                        @if (!$narrow && !empty($action['label']))
                            <span class="d-none d-md-inline">{{ $action['label'] }}</span>
                        @endif
                    </button>
                @endif
            @endforeach
        @else
            {{-- Desktop: Button Group --}}
            <div class="btn-group d-none d-md-flex ms-1" role="group">
                @foreach ($actions as $action)
                    @if (!empty($action['href']))
                        <a href="{{ $action['href'] }}" {{ !empty($action['target']) ? 'target="' . $action['target'] . '"' : '' }} id="{{ $action['key'] }}" class="btn btn-{{ $action['color'] }}" title="{{ $action['label'] }}">
                            <i class="fa-solid fa-fw fa-{{ $action['icon'] }}"></i>
                            @if (!$narrow && !empty($action['label']))
                                {{ $action['label'] }}
                            @endif
                        </a>
                    @elseif(!empty($action['wire:click']))
                        <button type="button" wire:click.stop="{{ $action['wire:click'] }}" id="{{ $action['key'] }}" class="btn btn-{{ $action['color'] }}" @if (!empty($action['wire:confirm'])) wire:confirm="{{ $action['wire:confirm'] }}" @endif title="{{ $action['label'] }}">
                            <i class="fa-solid fa-fw fa-{{ $action['icon'] }}"></i>
                            @if (!$narrow && !empty($action['label']))
                                {{ $action['label'] }}
                            @endif
                        </button>
                    @endif
                @endforeach
            </div>

            {{-- Mobile: Dropdown Menu --}}
            <div class="btn-group d-md-none ms-1">
                @if ($primary_action)
                    @if (!empty($primary_action['href']))
                        <a href="{{ $primary_action['href'] }}" {{ !empty($primary_action['target']) ? 'target="' . $primary_action['target'] . '"' : '' }} id="{{ $primary_action['key'] }}_primary" class="btn btn-{{ $primary_action['color'] }}" title="{{ $primary_action['label'] }}">
                            <i class="fa-solid fa-fw fa-{{ $primary_action['icon'] }}"></i>
                        </a>
                    @elseif(!empty($primary_action['wire:click']))
                        <button type="button" wire:click.stop="{{ $primary_action['wire:click'] }}" id="{{ $primary_action['key'] }}_primary" class="btn btn-{{ $primary_action['color'] }}" @if (!empty($primary_action['wire:confirm'])) wire:confirm="{{ $primary_action['wire:confirm'] }}" @endif title="{{ $primary_action['label'] }}">
                            <i class="fa-solid fa-fw fa-{{ $primary_action['icon'] }}"></i>
                        </button>
                    @endif
                @endif
                <button type="button" class="btn btn-{{ $primary_action ? $primary_action['color'] : 'secondary' }} dropdown-toggle dropdown-toggle-split" id="{{ $dropdown_id }}" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (!$primary_action)
                        <i class="fa-solid fa-fw fa-ellipsis-vertical"></i>
                    @endif
                    <span class="visually-hidden">{{ __('bootstrap::ui.open_menu') }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="{{ $dropdown_id }}">
                    @foreach ($actions as $action)
                        <li>
                            @if (!empty($action['href']))
                                <a href="{{ $action['href'] }}" {{ !empty($action['target']) ? 'target="' . $action['target'] . '"' : '' }} id="{{ $action['key'] }}_mobile" class="dropdown-item">
                                    <i class="fa-solid fa-fw fa-{{ $action['icon'] }}"></i>
                                    @if (!empty($action['label']))
                                        {{ $action['label'] }}
                                    @endif
                                </a>
                            @elseif(!empty($action['wire:click']))
                                <button type="button" class="dropdown-item" wire:click.stop="{{ $action['wire:click'] }}" id="{{ $action['key'] }}_mobile" @if (!empty($action['wire:confirm'])) wire:confirm="{{ $action['wire:confirm'] }}" @endif title="{{ $action['label'] }}">
                                    <i class="fa-solid fa-fw fa-{{ $action['icon'] }}"></i>
                                    @if (!empty($action['label']))
                                        {{ $action['label'] }}
                                    @endif
                                </button>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endif
