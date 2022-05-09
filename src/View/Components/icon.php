<?php

namespace kirinthor\AppUi\View\Components;

use Illuminate\View\Component;

class icon extends Component
{
	public string $style;

	public string $name;

	public function __construct(string $name, ?string $style = null)
	{
		$this->name  = $name;
		$this->style = $style ?: config('appui.icons.style');
	}

	public function render()
	{
		return view('appui::components.icon');
	}

}
