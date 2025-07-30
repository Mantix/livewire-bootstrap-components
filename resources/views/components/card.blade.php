@props(['title' => null, 'square' => false, 'background_image' => null, 'background_color' => null, 'text_color' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'card ' . ($square ? 'card-square' : '') . ' my-3']) }} style="{{ isset($background_image) ? 'background-image: url(\'' . $background_image . '\'); background-size: cover; background-position: center center;' : '' }}">
    @if (isset($title) && strval($title))
        <h4 class="card-header {{ isset($background_color) ? 'bg-' . $background_color : '' }} {{ isset($text_color) ? 'text-' . $text_color : '' }} p-4 pb-3">{!! $title !!}</h4>
    @endif
    <div class="card-body p-4">
        {{ $slot }}
    </div>
    @if (isset($footer) && strval($footer))
        <div class="card-footer p-4">
            {{ $footer }}
        </div>
    @endif
</div>
