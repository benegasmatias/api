<?php
namespace App\Controller;
use Cake\Event\Event;


use App\Controller\AppController;
use  Cake\Routing\Router;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{  
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('users', $this->Users->find('all'));

        $user = $this->paginate($this->Users->find());// this.->parecido al metodo find. select from

        $this->set([
            'users' => $user,
            '_serialize' => ['users'] //lo convierte en json
        ]);

   
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    /**
     * Add methodefe
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Users->patchEntity($article, $this->request->getData());

            // You could also do the following
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$article = $this->Users->patchEntity($article, $newData);
            if ($this->Users->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
               
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



   public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['generatepass','authlogin','logout','index','add']);
        
        $action = Router::getRequest()->params;
        if($this->request->session()->read('Auth.User.rol') == 'Administrador'){
            $permision = ['edit','credentials','logout'];
            if(!in_array($action['action'], $permision)){
                throw new UnauthorizedException('Faltan permisos',401);
            }
        }
      
    }
  


    public function authlogin()
    {
        if ($this->request->is('post')) {
            $this->Auth->identify();
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->response->withType('application/json')
                ->withStringBody(json_encode(['status'=>'OK',
                    'redirect'=>Router::url(['controller' => 'pages', 'action' => 'display'])]));
            }else{
               $msg = ['type'=>'danger','msg'=>['title'=>'Error!','body'=>'Usuario o contraseña incorrecta']];
                
                return $this->response->withStatus(401, $msg['msg']['body'])
                ->withStringBody(json_encode(['status'=>'OK','msg'=>$msg]));
            }            
        }
        throw new UnauthorizedException('Faltan permisos',401);  
    }
}
