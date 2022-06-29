<?php

namespace TwentySixB\LaravelDynamicPanels;

use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;
use TwentySixB\LaravelDynamicPanels\Http\Livewire\PanelContainer;

class DynamicPanelsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package) : void
    {
        $package->name('laravel-dynamic-panels')
            ->hasConfigFile()
            ->hasViews('dynamic-panels');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        \Livewire::component('dynamic-panels', PanelContainer::class);
    }
}
