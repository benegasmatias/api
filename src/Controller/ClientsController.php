<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypeConsumers', 'Sexs', 'TypePersons','Departments']
        ];
        $clients = $this->paginate($this->Clients->find());// this.->parecido al metodo find. select from

        $this->set([
            'clients' => $clients,
            '_serialize' => ['clients'] //lo convierte en json
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    

    public function vieww($dni)
    {
        $response_=$this->Clients->find()->where(['client_dni'=>$dni]);
       
        return $this->response->withType('application/json')->withStringBody(json_encode(['client'=>$response_]));
        
    }
   /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
  
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $client = $this->Clients->newEntity($this->request->getData());
     
        debug($client);
    
        if ($this->Clients->save($client)) {
         $message='saved';
        }else{      
            $message='mierda';
        }
        $this->set([
                'message' => $message,
                '_serialize' => ['message']
        ]);
    }



 
    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $typeConsumers = $this->Clients->TypeConsumers->find('list', ['limit' => 200]);
        $sexes = $this->Clients->Sexes->find('list', ['limit' => 200]);
        $typePeoples = $this->Clients->TypePeoples->find('list', ['limit' => 200]);
        $this->set(compact('client', 'typeConsumers', 'sexs', 'typePeoples'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $client = $this->Clients->get($id);
        $message = 'Deleted';
        if (!$this->Clients->delete($client)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
