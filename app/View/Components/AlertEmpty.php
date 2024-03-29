<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertEmpty extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $label;

    public function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-empty');
    }
}
