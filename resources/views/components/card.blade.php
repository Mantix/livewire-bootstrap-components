@props(['title' => null, 'square' => false, 'background_image' => null, 'background_color' => null, 'text_color' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'card ' . ($square ? 'card-square' : '') . ' mb-3']) }} style="{{ !empty($background_image) ? 'background-image: url(\'' . $background_image . '\'); background-size: cover; background-position: center center;' : '' }}">
    @if (!empty($title))
        <h4 class="card-header {{ !empty($background_color) ? 'bg-' . $background_color : '' }} {{ !empty($text_color) ? 'text-' . $text_color : '' }} p-3">{!! $title !!}</h4>
    @endif
    <div class="card-body p-3">
        {{ $slot }}
    </div>
    @if (!empty($footer))
        <div class="card-footer p-3">
            {{ $footer }}
        </div>
    @endif
</div>
