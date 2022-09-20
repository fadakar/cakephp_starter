<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * News Controller
 *
 * @property \App\Model\Table\NewsTable $News
 *
 * @method \App\Model\Entity\News[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $searchTerm = $this->request->getQuery('searchTerm');
        $newsTable = $this->News;
        $newsList = $this->News->find()
            ->contain(['category', 'tags']);
        if (!empty($searchTerm)) {
            $newsList->where("MATCH(News.title, body) AGAINST('$searchTerm' IN BOOLEAN MODE)");
        }

        $this->set(compact('newsList', 'newsTable'));
    }

    /**
     * View method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $slug = '')
    {
        $news = $this->News->get($id, [
            'contain' => ['category', 'tags'],
        ]);

//        debug($news->toArray());
//        debug($news->category);
//        debug($news->tags);
        $this->set('news', $news);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // TODO create or link tags to news

        $news = $this->News->newEntity();
        if ($this->request->is('post')) {
            $news = $this->News->patchEntity($news, $this->request->getData());
            if ($this->News->save($news)) {
                $this->Flash->success(__('The news has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {

                if (count($news->getErrors()) > 0) {
                    foreach ($news->getErrors() as $errors) {
                        foreach ($errors as $error) {
                            $this->Flash->error($error);
                        }
                    }
                } else {
                    $this->Flash->error(__('The news could not be saved. Please, try again.'));
                }

            }
        }
        $categoryTable = TableRegistry::getTableLocator()->get('category');
        $categories = $categoryTable->find('list')->limit(100);
        $this->set(compact('news', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // TODO create or link tags to news


        $news = $this->News->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $news = $this->News->patchEntity($news, $this->request->getData());
            if ($this->News->save($news)) {
                $this->Flash->success(__('The news has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news could not be saved. Please, try again.'));
        }
        $categoryTable = TableRegistry::getTableLocator()->get('category');
        $categories = $categoryTable->find('list')->limit(100);
        $this->set(compact('news', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $news = $this->News->get($id);
        if ($this->News->delete($news)) {
            $this->Flash->success(__('The news has been deleted.'));
        } else {
            $this->Flash->error(__('The news could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
