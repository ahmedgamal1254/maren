<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExamComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data=$this->data;
        return view('components.exam-component',compact("data"));
    }
}
