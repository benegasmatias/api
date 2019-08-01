<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypeConsumers Controller
 *
 * @property \App\Model\Table\TypeConsumersTable $TypeConsumers
 *
 * @method \App\Model\Entity\TypeConsumer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypeConsumersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $typeConsumers = $this->paginate($this->TypeConsumers);

        $this->set([
            'typeconsumers' => $typeConsumers,
            '_serialize' => ['typeconsumers']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Type Consumer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeConsumer = $this->TypeConsumers->get($id, [
            'contain' => []
        ]);

        $this->set('typeConsumer', $typeConsumer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeConsumer = $this->TypeConsumers->newEntity();
        if ($this->request->is('post')) {
            $typeConsumer = $this->TypeConsumers->patchEntity($typeConsumer, $this->request->getData());
            if ($this->TypeConsumers->save($typeConsumer)) {
                $this->Flash->success(__('The type consumer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type consumer could not be saved. Please, try again.'));
        }
        $this->set(compact('typeConsumer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Consumer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeConsumer = $this->TypeConsumers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeConsumer = $this->TypeConsumers->patchEntity($typeConsumer, $this->request->getData());
            if ($this->TypeConsumers->save($typeConsumer)) {
                $this->Flash->success(__('The type consumer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type consumer could not be saved. Please, try again.'));
        }
        $this->set(compact('typeConsumer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Consumer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeConsumer = $this->TypeConsumers->get($id);
        if ($this->TypeConsumers->delete($typeConsumer)) {
            $this->Flash->success(__('The type consumer has been deleted.'));
        } else {
            $this->Flash->error(__('The type consumer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
