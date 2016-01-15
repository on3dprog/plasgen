<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class DepartamentosController extends AppController
{   
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
    }

    public function index()
    {
        $this->set('datatables',1);
        $this->set('departamentos', $this->Departamentos->find('all'));
    }
    
    public function form($id=NULL)
    {
        $this->set('id',$id);

        //AÑADIR
        if(!$id){
            
            $departamento = $this->Departamentos->newEntity();
            if ($this->request->is('post')) {
                $departamento = $this->Departamentos->patchEntity($departamento, $this->request->data);
                if ($this->Departamentos->save($departamento)) {
                    $this->Flash->success(__('El departamento ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido añadir el departamento.'));
            }
            $this->set('departamento', $departamento);            
            
        //EDITAR    
        }else{
            
            $departamento = $this->Departamentos->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Departamentos->patchEntity($departamento, $this->request->data);
                if ($this->Departamentos->save($departamento)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('departamento', $departamento);
        }
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $departamento = $this->Departamentos->get($id);
        if ($this->Departamentos->delete($departamento)) {
            $this->Flash->success(__('El registro con ID: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
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
            if ($this->Departamentos->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>