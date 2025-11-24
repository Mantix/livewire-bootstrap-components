@props(['title' => null, 'background_image' => null, 'background_color' => null, 'text_color' => null, 'footer' => null, 'body_class' => null])

<div {{ $attributes->class(['card', 'mb-3' => strpos($attributes->get('class'), 'mb-') === false]) }} style="{{ !empty($background_image) ? 'background-image: url(\'' . $background_image . '\'); background-size: cover; background-position: center center;' : '' }}">
    @if (!empty($title))
        <h4 class="card-header {{ !empty($background_color) ? 'bg-' . $background_color : '' }} {{ !empty($text_color) ? 'text-' . $text_color : '' }} p-3">{!! $title !!}</h4>
    @endif
    <div class="card-body {{ !empty($body_class) && strpos($body_class, 'p-') === false ? '' : 'p-3' }} {{ $body_class ?? '' }}">
        {{ $slot }}
    </div>
    @if (!empty($footer))
        <div class="card-footer p-3">
            {{ $footer }}
        </div>
    @endif
</div>
