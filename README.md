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

## Components

### Card Component

A flexible card component with customizable styling and optional header/footer.

```blade
<x-livewire-bootstrap-components::card 
    title="Card Title"
    :square="true"
    background_image="/path/to/image.jpg"
    background_color="primary"
    text_color="white"
    footer="Footer content">
    Card content here.
</x-livewire-bootstrap-components::card>
```

**Attributes:**
- `title` (string, optional): Card header title
- `square` (boolean, default: false): Apply square styling
- `background_image` (string, optional): Background image URL
- `background_color` (string, optional): Bootstrap background color class
- `text_color` (string, optional): Bootstrap text color class
- `footer` (string, optional): Footer content

### Form Group Component

A form group wrapper with label, icon support, and automatic error handling.

```blade
<x-livewire-bootstrap-components::form-group 
    label="Email Address"
    icon="envelope"
    :required="true">
    <input type="email" name="email" class="form-control" wire:model="email">
</x-livewire-bootstrap-components::form-group>
```

**Attributes:**
- `label` (string, optional): Form field label
- `icon` (string, optional): FontAwesome icon name (without 'fa-' prefix)
- `required` (boolean, default: false): Show required asterisk

**Features:**
- Automatically detects `wire:model` and displays validation errors
- Supports input groups with icons
- Responsive design with proper spacing

### List Row Component

A list item component with action buttons for CRUD operations.

```blade
<x-livewire-bootstrap-components::list-row 
    class="custom-class"
    background_color="light"
    text_color="dark"
    view="viewItem"
    start="startItem"
    sort_up="moveUp"
    sort_down="moveDown"
    edit="editItem"
    delete="deleteItem">
    Item content here
</x-livewire-bootstrap-components::list-row>
```

**Attributes:**
- `class` (string, optional): Additional CSS classes
- `background_color` (string, optional): Bootstrap background color
- `text_color` (string, optional): Bootstrap text color
- `view` (string, optional): Livewire method for view action
- `start` (string, optional): Livewire method for start action
- `sort_up` (string, optional): Livewire method for move up
- `sort_down` (string, optional): Livewire method for move down
- `edit` (string, optional): Livewire method for edit action
- `delete` (string, optional): Livewire method for delete action

**Features:**
- Double-click to view or edit
- Responsive button labels (hidden on mobile)
- Confirmation dialog for delete action

### Modal Component

A complete modal component with form support and multiple levels.

```blade
<x-livewire-bootstrap-components::modal 
    id="myModal"
    size="lg"
    title="Modal Title"
    close_function="closeModal"
    submit_function="saveData"
    submit_color="primary"
    submit_text="Save"
    submit_icon="save"
    :level="2">
    Modal content here
</x-livewire-bootstrap-components::modal>
```

**Attributes:**
- `id` (string, required): Modal ID
- `size` (string, optional): Modal size (sm, lg, xl)
- `title` (string, required): Modal title
- `close_function` (string, optional): Livewire method to close modal
- `submit_function` (string, optional): Livewire method for form submission
- `submit_color` (string, optional): Submit button color (default: primary)
- `submit_text` (string, optional): Submit button text
- `submit_icon` (string, optional): Submit button icon
- `level` (integer, optional): Modal z-index level (1-5)

**Features:**
- ESC key support for closing
- Loading states on submit button
- Multiple z-index levels for nested modals
- Automatic form wrapper when submit function is provided

### Session Message Component

Displays session flash messages with different types.

```blade
<x-livewire-bootstrap-components::session-message />
```

**Features:**
- Displays `message` (info), `success`, and `danger` session messages
- Dismissible alerts with close buttons
- Automatic error display integration

### Errors Component

Displays validation errors in a dismissible alert.

```blade
<x-livewire-bootstrap-components::errors />
```

**Features:**
- Shows all validation errors in a single alert
- Dismissible with close button
- Automatically included in modal

## Styles

The package includes SCSS files for modal z-index management. After publishing the SCSS files, you can import them in your main SCSS file:

```scss
@import 'vendor/livewire-bootstrap-components/livewire-bootstrap-components';
```

### Modal Z-Index Levels

The package provides 5 levels of modal z-index management:

- Level 1: Default Bootstrap modal (z-index: 1055)
- Level 2: z-index: 1065 (backdrop: 1060)
- Level 3: z-index: 1075 (backdrop: 1070)
- Level 4: z-index: 1085 (backdrop: 1080)
- Level 5: z-index: 1095 (backdrop: 1090)

## Requirements

- Laravel 8+
- Livewire 3.x
- Bootstrap 5.x
- FontAwesome 6.x

## License

MIT © Mantix BV