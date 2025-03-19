<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartTotal extends Component
{
    /**
     * Create a new component instance.
     */
    public $total;

    public function __construct($carts)
    {
        $this->total = $carts->sum('sub_total');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-total');
    }
}
