@props(['title' => null, 'background_image' => null, 'background_color' => null, 'text_color' => null, 'footer' => null])

<div {{ $attributes->class(['card', 'mb-3' => strpos($attributes->get('class'), 'mb-') === false]) }} style="{{ !empty($background_image) ? 'background-image: url(\'' . $background_image . '\'); background-size: cover; background-position: center center;' : '' }}">
    @if (!empty($title))
        <h4 class="card-header {{ !empty($background_color) ? 'bg-' . $background_color : '' }} {{ !empty($text_color) ? 'text-' . $text_color : '' }} p-3">{!! $title !!}</h4>
    @endif
    <div {{ $attributes->class(['card-body', 'p-3' => strpos($attributes->get('class'), 'p-') === false]) }}>
        {{ $slot }}
    </div>
    @if (!empty($footer))
        <div class="card-footer p-3">
            {{ $footer }}
        </div>
    @endif
</div>
