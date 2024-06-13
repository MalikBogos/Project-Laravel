<?php


// app/view/components/DateInput.php
namespace App\View\Components;

use Illuminate\View\Component;

class DateInput extends Component
{
    public $id;
    public $name;
    public $class;
    public $value;

    public function __construct($id = null, $name = null, $class = null, $value = null)
    {
        $this->id = $id ?? $name;
        $this->name = $name;
        $this->class = $class;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.date-input');
    }
}

