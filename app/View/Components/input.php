<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    public $name, $type, $placeholder, $value, $attribute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type, $placeholder, $value = "", $attribute = "")
    {
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->attribute = $attribute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
