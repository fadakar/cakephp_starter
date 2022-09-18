<?php

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Utility\Text;

/**
 * Slug behavior
 */
class SlugBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function slug($value)
    {
        return Text::slug($value, '-');
    }
}
