@props(['class' => null, 'background_color' => null, 'text_color' => null, 'narrow' => false, 'actions' => []])

@php
    $actions = is_array($actions) ? $actions : [];
    $actions_id_prefix = 'list_row_actions_' . uniqid();

    // Find the first primary action to wire up the double-click helper
    $primary_action_key = collect($actions)
        ->keys()
        ->first(function ($key) use ($actions) {
            return ($actions[$key]['color'] ?? null) === 'primary';
        });
    $primary_action = $primary_action_key !== null ? $actions[$primary_action_key] : null;

    $dblclick_value = null;
    if ($primary_action) {
        if (isset($primary_action['wire:click'])) {
            $dblclick_value = '$wire.' . $primary_action['wire:click'];
        } elseif (isset($primary_action['href'])) {
            $base_key = $actions_id_prefix . '_' . $primary_action_key;
            $dblclick_value = "(document.getElementById('{$base_key}') || document.getElementById('{$base_key}_primary') || document.getElementById('{$base_key}_mobile'))?.click()";
        }
    }
@endphp

<li class="list-group-item d-flex justify-content-between align-items-center {{ $class }} {{ !empty($background_color) ? 'bg-' . $background_color : '' }} {{ !empty($text_color) ? 'text-' . $text_color : '' }}" @if (!empty($dblclick_value)) @dblclick="{{ $dblclick_value }}" @endif>
    <div class="flex-grow-1 my-1 me-3 text-truncate" style="min-width: 0;">
        {{ $slot }}
    </div>

    <x-bootstrap::actions :actions="$actions" :narrow="$narrow" :id-prefix="$actions_id_prefix" />
</li>
