<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Ramsey\Uuid\Type\Integer;

class Operation extends Component
{
    public $edit_val;
    public $delete_val;
    public $view_val;
    public $ele_id;
    public function __construct(public string $edit,public string $delete="del",public string $view="yes",public $id=0)
    {
        $this->edit_val=$edit;
        $this->delete_val=$delete;
        $this->view_val=$view;
        $this->ele_id=$id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $edit=$this->edit_val;
        $delete=$this->delete_val;
        $view=$this->view_val;
        $id=$this->ele_id;

        return view('components.operation',compact("edit","delete","view","id"));
    }
}
