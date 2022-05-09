<?php

namespace kirinthor\AppUi\View\Components;

use kirinthor\AppUi\View\Components\Button\BaseButton;

class Button extends BaseButton
{
	protected function outlineColors(): array{
		return  [];
	}

	protected function sizes(): array
	{
		return [
			'2xs'         => 'gap-x-0.5 text-2xs px-2 py-0.5',
			'xs'          => 'gap-x-1 text-xs px-2.5 py-1.5',
			'sm'          => 'gap-x-2 text-sm leading-4 px-3 py-2',
			self::DEFAULT => 'gap-x-2 text-sm px-4 py-2',
			'md'          => 'gap-x-2 text-base px-4 py-2',
			'lg'          => 'gap-x-2 text-base px-6 py-3',
			'xl'          => 'gap-x-3 text-base px-7 py-4',
		];
	}
	protected function iconSizes(): array
	{
		return [
			'2xs'         => 'w-2 h-2',
			'xs'          => 'w-3 h-3',
			'sm'          => 'w-3.5 h-3.5',
			self::DEFAULT => 'w-4 h-4',
			'md'          => 'w-4 h-4',
			'lg'          => 'w-5 h-5',
			'xl'          => 'w-6 h-6',
		];
	}

	/**
	 * @return array
	 */
	protected function flatColors(): array
	{
		return [];
	}

	/**
	 * @return array
	 */
	protected function defaultColors(): array
	{
		return [
			self::DEFAULT => <<<EOT
                border text-slate-500 hover:bg-slate-100 ring-slate-200
                dark:ring-slate-600 dark:border-slate-500 dark:hover:bg-slate-700
                dark:ring-offset-slate-800 dark:text-slate-400
            EOT,
			'primary' => <<<EOT
				ring-primary text-white bg-primary/80 hover:bg-primary hover:ring-primary
				dark:ring-offset-slate-800 dark:bg-dark-primary/90 dark:ring-dark-primary
				dark:hover:bg-dark-primary dark:hover:ring-primary
			EOT
		];
	}
}
