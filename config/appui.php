<?php
use kirinthor\AppUi\View\Components;
return [
	/*
		|--------------------------------------------------------------------------
		| Icons
		|--------------------------------------------------------------------------
		|
		| La configuración de iconos se usará en el componente de iconos de forma predeterminada
		|
		|
	*/
	'icons' => [
		'style' => env('APPUI_ICONS_STYLE', 'outline'),
	],
	/*
		|--------------------------------------------------------------------------
		| Modal
		|--------------------------------------------------------------------------
		|
		| Las preferencias modales predeterminadas
		|
	*/
	'modal' => [
		'zIndex'   => env('APPUI_MODAL_Z_INDEX', 'z-50'),
		'maxWidth' => env('APPUI_MODAL_MAX_WIDTH', '2xl'),
		'spacing'  => env('APPUI_MODAL_SPACING', 'p-4'),
		'align'    => env('APPUI_MODAL_ALIGN', 'start'),
		'blur'     => env('APPUI_MODAL_BLUR', false),
	],
	/*
	|--------------------------------------------------------------------------
	| Components
	|--------------------------------------------------------------------------
	|
	| Lista con componentes AppUI.
	| Cambie el alias para llamar al componente con un nombre diferente.
	| Extienda el componente y reemplace sus cambios en este archivo.
	| Elimine el componente de este archivo si no desea utilizarlo.
	|
 */
	'components' => [
		'icon' => [
			'class' => Components\Icon::class,
			'alias' => 'icon',
		],
		'button' => [
			'class' => Components\Button::class,
			'alias' => 'button',
		],
		]
];
