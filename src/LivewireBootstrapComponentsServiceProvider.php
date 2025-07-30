<?php

namespace Mantix\LivewireBootstrapComponents;

use Illuminate\Support\ServiceProvider;

class LivewireBootstrapComponentsServiceProvider extends ServiceProvider {
    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bootstrap');
        $this->publishes([
            __DIR__ . '/../resources/views' => app_path('../resources/views/vendor/livewire-bootstrap-components'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/scss' => app_path('../resources/scss/vendor/livewire-bootstrap-components'),
        ], 'scss');
    }
}
