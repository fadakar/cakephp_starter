<?php

namespace App\Model\Table;

use ArrayObject;
use Cake\Database\Expression\QueryExpression;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * News Model
 *
 * @method \App\Model\Entity\News get($primaryKey, $options = [])
 * @method \App\Model\Entity\News newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\News[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\News|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\News saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\News patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\News[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\News findOrCreate($search, callable $callback = null, $options = [])
 */
class NewsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Slug');

        $this->setTable('news');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsToMany('tags', [
            'through' => 'NewsTags',
            'foreignKey' => 'news_id',
            'targetForeignKey' => 'tags_id',
        ]);

        $this->belongsTo('category', [
            'foreignKey' => 'category_id'
        ]);
    }


    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        if (isset($data['title'])) {
            $data['title'] = 'title: ' . $data['title'];
        }
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->notEmptyString('title', 'Please fill Title');

        $validator
            ->scalar('body')
            ->allowEmptyString('body');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['title'], 'title is unique, please choose another'));
        return $rules;
    }


    /**
     * full text search in news and relations
     * @param Query $query
     * @param array $options
     * @return Query
     */
    public function FindFullTextSearch(Query $query, array $options): Query
    {
        $term = $options['term'] ?? '';
        $query->where(function (QueryExpression $exp, Query $query) use ($term) {
            $newsSearch = $query->newExpr("MATCH(News.title, News.body) AGAINST('*$term*' IN BOOLEAN MODE)");
            $categorySearch = $query->newExpr("MATCH(category.title) AGAINST('*$term*' IN BOOLEAN MODE)");

            return $exp->or([
                $newsSearch, $categorySearch
            ]);
        });
        return $query;
    }
}
