<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $total_pages;
    public $per_page;
    public $items;
    public $url;
    public $page_id;

    public function __construct(public int $pages=10,public int $page=1)
    {
        $this->total_pages=$pages;

        $this->page_id=$page;

        // $this->url=$url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $total_pages = ceil($this->total_pages / 1);

        $page_id=$this->page_id;

        return view('components.pagination',compact('total_pages','page_id'));
    }
}
