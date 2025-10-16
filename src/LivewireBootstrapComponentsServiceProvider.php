<?php

namespace Mantix\LivewireBootstrapComponents;

use Illuminate\Support\ServiceProvider;

class LivewireBootstrapComponentsServiceProvider extends ServiceProvider {
    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bootstrap');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'bootstrap');
        $this->publishes([
            __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/livewire-bootstrap-components'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/scss' => $this->app->resourcePath('scss/vendor/livewire-bootstrap-components'),
        ], 'scss');

        $this->publishes([
            __DIR__ . '/../resources/lang' => $this->app->resourcePath('lang/vendor/livewire-bootstrap-components'),
        ], 'lang');
    }
}
