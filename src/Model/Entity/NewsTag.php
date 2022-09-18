<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NewsTag Entity
 *
 * @property int|null $news_id
 * @property int|null $tags_id
 * @property int $id
 *
 * @property \App\Model\Entity\News $news
 * @property \App\Model\Entity\Tag $tag
 */
class NewsTag extends Entity
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
        'news_id' => true,
        'tags_id' => true,
        'news' => true,
        'tag' => true,
    ];
}
