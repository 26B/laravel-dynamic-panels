# Laravel Dynamic Panels

Provides an area on your website to display panels dynamically.

Currently supports:

- Random panel loading.
- Manual panel changing.
- Timer based panel changing.

## Getting started

Require the package

```
composer require 26b/laravel-dynamic-panels
```


## Usage

Create as many livewire components as you want, where you overload the method `getPanels` with a list of the panels you want to display.

```php
namespace App\Http\Livewire\DynamicPanels;

use TwentySixB\LaravelDynamicPanels\Http\Livewire\PanelContainer;

class Container extends PanelContainer
{

    /**
     * @inheritDoc
     *
     * @return array
     */
    public function getPanels() : array
    {
        return [
            'livewire:profile-completion-panel',
            'did-you-know',
            'app-install',
        ];
    }
}
```

## Customizing

Publish the configuration file should you need to customise it.

```
php artisan vendor:publish --tag=dynamic-panels-views
```
