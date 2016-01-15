<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class AlarmasController extends AppController
{   
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
        //$this->Auth->allow(['add', 'logout']);
    }

    public function index()
    {
        $this->set('datatables',1);
        $this->set('alarmas', $this->Alarmas->find('all'));
    }
    
    public function form($id=NULL)
    {
        $this->set('id',$id);

        //AÑADIR
        if(!$id){
            
            $alarma = $this->Alarmas->newEntity();
            if ($this->request->is('post')) {
                $alarma = $this->Alarmas->patchEntity($alarma, $this->request->data);
                if ($this->Alarmas->save($alarma)) {
                    $this->Flash->success(__('El registro ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido añadir el registro.'));
            }
            $this->set('alarma', $alarma);            
            
        //EDITAR    
        }else{
            
            $alarma = $this->Alarmas->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Alarmas->patchEntity($alarma, $this->request->data);
                if ($this->Alarmas->save($alarma)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('alarma', $alarma);            
        }
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $alarma = $this->Alarmas->get($id);
        if ($this->Alarmas->delete($alarma)) {
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
            if ($this->Alarmas->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>