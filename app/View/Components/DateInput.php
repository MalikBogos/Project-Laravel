<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DateInput extends Component
{
    /**
     * The component's attributes.
     *
     * @var string
     */
    public $id;
    public $name;
    public $class;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null, $name = null, $class = null, $value = null)
    {
        $this->id = $id ?? $name;
        $this->name = $name;
        $this->class = $class;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.date-input');
    }
}
