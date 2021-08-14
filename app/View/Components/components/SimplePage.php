<?php

namespace App\View\Components\components;

use Illuminate\View\Component;

class SimplePage extends Component
{
    public $title;
    public $breadcrumbs;
    public $illustration;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $breadcrumbs, $illustration)
    {
        $this->title = $title;
        $this->breadcrumbs = collect($breadcrumbs);
        $this->illustration = $illustration;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.components.simple-page');
    }
}
