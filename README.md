# Livewire Bootstrap Components

Reusable Livewire Bootstrap components by Mantix BV.

## Installation

```bash
composer require mantix/livewire-bootstrap-components
```

## Usage

Publish the views and styles (optional):

```bash
# Publish views
php artisan vendor:publish --provider="Mantix\\LivewireBootstrapComponents\\LivewireBootstrapComponentsServiceProvider" --tag=views

# Publish SCSS files
php artisan vendor:publish --provider="Mantix\\LivewireBootstrapComponents\\LivewireBootstrapComponentsServiceProvider" --tag=scss
```

Use the components in your Blade files:

```blade
<x-livewire-bootstrap-components::card title="My Card">
    Card content here.
</x-livewire-bootstrap-components::card>
```

### Styles

The package includes SCSS files for modal z-index management. After publishing the SCSS files, you can import them in your main SCSS file:

```scss
@import 'vendor/livewire-bootstrap-components/livewire-bootstrap-components';
```

## License

MIT © Mantix BV