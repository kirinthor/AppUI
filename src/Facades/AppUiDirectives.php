<?php

namespace kirinthor\AppUi\Facades;

use Illuminate\Support\Facades\Facade;
use kirinthor\AppUi\AppUiBladeDirectives;

/**
 * @method static string scripts(bool $absolute = true)
 * @method static string styles(bool $absolute = true)
 * @method static string|null getManifestVersion(string $file, ?string &$route = null)
 * @method static string confirmAction(string $expression)
 * @method static string notify(string $expression)
 * @method static string boolean(string $value)
 */
class AppUiDirectives extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AppUiBladeDirectives::class;
    }
}
