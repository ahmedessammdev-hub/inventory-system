<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * The page title.
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param string|null $title
     */
    public function __construct($title = null)
    {
        $this->title = $title ?? 'Dashboard';
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
