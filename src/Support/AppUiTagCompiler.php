<?php

namespace kirinthor\AppUi\Support;

use Illuminate\View\Compilers\ComponentTagCompiler;
use kirinthor\AppUi\Facades\AppUiDirectives;

class AppUiTagCompiler extends ComponentTagCompiler
{
    public function compile($value)
    {
        return $this->compileAppUiSelfClosingTags($value);
    }

    protected function compileAppUiSelfClosingTags($value)
    {
        $pattern = '<\s*appui\:(scripts|styles)\s*\/?>';

        return preg_replace_callback($pattern, function (array $matches) {
            if ($matches[1] === 'scripts') {
                $element = AppUiDirectives::scripts();
            }

            if ($matches[1] === 'styles') {
                $element = AppUiDirectives::styles();
            }

            return trim($element, '<>');
        }, $value);
    }
}
