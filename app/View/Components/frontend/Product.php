<?php

namespace App\View\Components\frontend;

use Closure;
use App\Models\Product as ModelProduct;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Product extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = ModelProduct::get();
        return view('components.frontend.product', compact('products'));
    }
}
