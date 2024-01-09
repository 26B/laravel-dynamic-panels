<?php

namespace TwentySixB\LaravelDynamicPanels;

use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;
use TwentySixB\LaravelDynamicPanels\Livewire\PanelContainer;

/**
 * Package Service Provider
 *
 */
class DynamicPanelsServiceProvider extends PackageServiceProvider
{

    /**
     * @inheritDoc
     *
     * @param Package $package
     * @return void
     */
    public function configurePackage(Package $package) : void
    {
        $package->name('laravel-dynamic-panels')
            ->hasConfigFile()
            ->hasViews('dynamic-panels');
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function packageBooted() : void
    {
        \Livewire::component('dynamic-panels', PanelContainer::class);
    }
}
