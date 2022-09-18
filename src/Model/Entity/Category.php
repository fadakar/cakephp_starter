<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $lft
 * @property int|null $rght
 * @property int|null $parent_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ParentCategory $parent_category
 * @property \App\Model\Entity\ChildCategory[] $child_category
 */
class Category extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'title' => true,
        'description' => true,
        'lft' => true,
        'rght' => true,
        'parent_id' => true,
        'created' => true,
        'modified' => true,
        'parent_category' => true,
        'child_category' => true,
    ];
}
