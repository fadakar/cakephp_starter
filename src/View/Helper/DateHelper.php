<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Data helper
 */
class DateHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function toJalali($date)
    {
        return "jalali {$date}";
    }
}
