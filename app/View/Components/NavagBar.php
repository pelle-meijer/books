<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Translation;
use App\Http\Controllers\TranslationController;

class NavagBar extends Component
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
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.nav-bar', ['translations' => Translation::all(), 'language' => session('language','4')]);
    }
}
