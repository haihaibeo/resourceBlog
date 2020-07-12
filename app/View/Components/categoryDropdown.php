<?php

namespace App\View\Components;

use App\Category;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;

class categoryDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $categories = Category::all();
        return view('components.category-dropdown', [
            'categories' => $categories,
        ]);
    }
}
