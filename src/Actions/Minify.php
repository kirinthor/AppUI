<?php

namespace kirinthor\AppUi\Actions;

class Minify
{
    public static function execute($subject)
    {
        return preg_replace('~(\v|\t|\s{2,})~m', '', $subject);
    }
}
