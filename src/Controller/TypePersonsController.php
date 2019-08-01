<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypePersons Controller
 *
 * @property \App\Model\Table\TypePersonsTable $TypePersons
 *
 * @method \App\Model\Entity\TypePerson[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypePersonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $typePersons = $this->paginate($this->TypePersons);

        $this->set([
            'typepersons' => $typePersons,
            '_serialize' => ['typepersons']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Type Person id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typePerson = $this->TypePersons->get($id, [
            'contain' => []
        ]);

        $this->set('typePerson', $typePerson);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typePerson = $this->TypePersons->newEntity();
        if ($this->request->is('post')) {
            $typePerson = $this->TypePersons->patchEntity($typePerson, $this->request->getData());
            if ($this->TypePersons->save($typePerson)) {
                $this->Flash->success(__('The type person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type person could not be saved. Please, try again.'));
        }
        $this->set(compact('typePerson'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Person id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typePerson = $this->TypePersons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typePerson = $this->TypePersons->patchEntity($typePerson, $this->request->getData());
            if ($this->TypePersons->save($typePerson)) {
                $this->Flash->success(__('The type person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type person could not be saved. Please, try again.'));
        }
        $this->set(compact('typePerson'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Person id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typePerson = $this->TypePersons->get($id);
        if ($this->TypePersons->delete($typePerson)) {
            $this->Flash->success(__('The type person has been deleted.'));
        } else {
            $this->Flash->error(__('The type person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
