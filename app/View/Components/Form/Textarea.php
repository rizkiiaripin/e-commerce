<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $name, $type, $placeholder, $value, $label, $id , $required;

    /**
     * Create a new component instance.
     */
    public function __construct( $name, $placeholder = '', $value = '',$label = null, $required = 'required' , $id = '',$type = 'text')
    {
        $this->id = $id;
        $this->type = $type;
        $this->required = $required;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
