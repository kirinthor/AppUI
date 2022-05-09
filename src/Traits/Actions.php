<?php

namespace kirinthor\AppUi\Traits;

use kirinthor\AppUi\Support\{Dialog, Notification};

trait Actions
{
    public function notification(): Notification
    {
        return new Notification($this);
    }

    public function dialog(): Dialog
    {
        return new Dialog($this);
    }
}
