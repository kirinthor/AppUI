<?php

namespace kirinthor\AppUi\Facades;

use Illuminate\Support\Facades\Facade;
use kirinthor\AppUi\AppUiComponentResolver;

/**
 * @method static string resolve(string $originalComponentName)
 */
class AppUiComponent extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AppUiComponentResolver::class;
    }
}
