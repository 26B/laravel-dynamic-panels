<?php

namespace TwentySixB\LaravelDynamicPanels\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class PanelContainer extends Component
{

    protected $listeners = ['next'];

    /**
     * Number of milliseconds to rotate panels.
     *
     * Set as zero to disable.
     *
     * @var integer
     */
    public int $interval = 3000;

    /**
     * List of panels to render.
     *
     * Can be weither livewire or view components.
     *
     * @return array
     */
    public function getPanels() : array {
        return [];
    }

    /**
     * @inheritDoc
     *
     */
    public function render()
    {
        $panel = $this->next();

        if (Str::startsWith($panel, 'livewire:')) {
            $type = 'livewire';
            $name = 'dynamic-panels.' . Str::after($panel, 'livewire:');
        } else {
            $type = 'component';
            $name = 'dynamic-panels.' . $panel;
        }

        return view::first(
            [
                'dynamic-panels::livewire.dynamic-panels.container',
                'livewire.dynamic-panels.container',
            ]
        )->with('panel', $name)
            ->with('type', $type);
    }

    /**
     * Fetch a new panel.
     *
     * @return string
     */
    public function next() : string
    {
        $panels = $this->getPanels();
        return $panels[ rand(0, count($panels)-1) ];
    }
}
