<?php

namespace TwentySixB\LaravelDynamicPanels\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class PanelContainer extends Component
{

    protected $listeners = ['next', 'open'];

    /**
     * Number of milliseconds to rotate panels.
     *
     * Set as zero to disable.
     *
     * @var integer
     */
    public int $interval = 3000;

    /**
     * Name of the active panel.
     *
     * @var string
     */
    public string $active = '';

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
        if (empty($this->active)) {
            $this->active = $this->next();
        }

        $panel = $this->active;

        if (Str::startsWith($panel, 'livewire:')) {
            $type = 'livewire';
            $name = 'dynamic-panels.' . Str::after($panel, 'livewire:');
        } else {
            $type = 'component';
            $name = 'dynamic-panels.' . $panel;
        }

        return view::first(
            [
                'livewire.dynamic-panels.container',
                'dynamic-panels::livewire.dynamic-panels.container',
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
        return $this->panel = $panels[ rand(0, count($panels)-1) ];
    }

    /**
     * Open a specified panel.
     *
     * @param string $name
     * @return string
     */
    public function open(string $name) : string
    {
        $panels = $this->getPanels();
        // TODO: Check if panel exists.
        return $this->panel = $name;
    }
}
