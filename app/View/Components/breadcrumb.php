<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class breadcrumb extends Component
{
    public $currentUrl;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $urls = explode("/", url()->current());
        $urls = array_slice($urls, 3);
        $urls = str_replace('-', ' ', $urls);
        $currentUrl = end($urls);
        $this->currentUrl = $currentUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $segments = collect(request()->segments()) ->reject(function ($segment, $key) {
            // Buang segment kalau:
            return in_array($segment, ['create', 'edit']) === false // kecuali create/edit
                && $key > 0 // abaikan segment pertama (biasanya resource utama)
                && is_numeric($segment); // dan kalau bukan ID
        })->values()->toArray(); // Mengambil segment dari URL
        

        return view('components.breadcrumb', compact('segments'));
    }
}
