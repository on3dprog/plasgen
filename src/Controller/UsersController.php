<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{   
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }

    public function index()
    {
        $this->set('datatables',1);
        $this->set('usuarios', $this->Users->find('all'));
    }
    
    public function form($id=NULL)
    {
        $this->set('id',$id);
        $roles = array('ADMIN'=>'ADMIN','COMERCIAL'=>'COMERCIAL','COMPRAS'=>'COMPRAS','ADMINISTRACION'=>'ADMINISTRACION','PRODUCCION'=>'PRODUCCION','ALMACEN'=>'ALMACEN');
        $this->set('roles',$roles);
        
        //AÑADIR
        if(!$id){
            
            $user = $this->Users->newEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El registro ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido añadir el registro.'));
            }
            $this->set('user', $user);            
            
        //EDITAR
        }else{
            
            $user = $this->Users->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('user', $user); 
        }
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $usuario = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El registro con ID: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuario o contraseña no validos'));
        }
    }
    
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    public function isAuthorized($user)
    {
        // All registered users can add articles
        if ($this->request->action === 'add') {
            return true;
        }
    
        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $articleId = (int)$this->request->params['pass'][0];
            if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>