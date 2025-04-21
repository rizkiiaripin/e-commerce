<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name, $type, $placeholder, $value, $label, $id , $required;
    /**
     * Create a new component instance.
     */
    public function __construct( $name, $type = 'text', $placeholder = '', $value = '',$label = null, $required = 'required' , $id = '')
    {
        $this->id = $id;
        $this->required = $required;
        $this->name = $name;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->label = $label;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
