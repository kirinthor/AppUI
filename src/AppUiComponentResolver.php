<?php

namespace kirinthor\AppUi;

class AppUiComponentResolver
{
    public function resolve(string $originalComponentName): string
    {
        $components = config('appui.components');

        return $components[$originalComponentName]['alias'];
    }
}
