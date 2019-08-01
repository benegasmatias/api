<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sexs Controller
 *
 * @property \App\Model\Table\SexsTable $Sexs
 *
 * @method \App\Model\Entity\Sex[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SexsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $sexs = $this->paginate($this->Sexs);

        $this->set([
            'sexs' => $sexs,
            '_serialize' => ['sexs']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sex = $this->Sexs->get($id, [
            'contain' => ['Clients']
        ]);

        $this->set('sex', $sex);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sex = $this->Sexs->newEntity();
        if ($this->request->is('post')) {
            $sex = $this->Sexs->patchEntity($sex, $this->request->getData());
            if ($this->Sexs->save($sex)) {
                $this->Flash->success(__('The sex has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sex could not be saved. Please, try again.'));
        }
        $this->set(compact('sex'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sex = $this->Sexs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sex = $this->Sexs->patchEntity($sex, $this->request->getData());
            if ($this->Sexs->save($sex)) {
                $this->Flash->success(__('The sex has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sex could not be saved. Please, try again.'));
        }
        $this->set(compact('sex'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sex id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sex = $this->Sexs->get($id);
        if ($this->Sexs->delete($sex)) {
            $this->Flash->success(__('The sex has been deleted.'));
        } else {
            $this->Flash->error(__('The sex could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
