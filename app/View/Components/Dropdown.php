<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
  public $align;
  public $width;
  public $contentClasses;

  public function __construct($align = 'right', $width = '48', $contentClasses = 'py-1 bg-white')
  {
    $this->align = $align;
    $this->width = $width;
    $this->contentClasses = $contentClasses;
  }

  public function render()
  {
    return view('components.dropdown');
  }
}
