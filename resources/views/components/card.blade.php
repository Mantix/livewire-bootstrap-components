@props(['title' => null, 'background_image' => null, 'background_color' => null, 'text_color' => null, 'footer' => null, 'body_class' => null, 'actions' => []])

<div {{ $attributes->class(['card', 'mb-3' => strpos($attributes->get('class'), 'mb-') === false]) }} style="{{ !empty($background_image) ? 'background-image: url(\'' . $background_image . '\'); background-size: cover; background-position: center center;' : '' }}">
    @if (!empty($title) || !empty($actions))
        <div class="card-header d-flex justify-content-between align-items-center p-3 {{ !empty($background_color) ? 'bg-' . $background_color : '' }} {{ !empty($text_color) ? 'text-' . $text_color : '' }}">
            @if (!empty($title))
                <h4>{!! $title !!}</h4>
            @endif
            @if (!empty($actions))
                <x-bootstrap::actions :actions="$actions" class="ms-2" />
            @endif
        </div>
    @endif
    <div class="card-body {{ !empty($body_class) && strpos($body_class, 'p-') === false ? 'p-3' : '' }} {{ $body_class ?? '' }}">
        {{ $slot }}
    </div>
    @if (!empty($footer))
        <div class="card-footer p-3">
            {{ $footer }}
        </div>
    @endif
</div>
