<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class AseguradorasController extends AppController
{   
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
        //$this->Auth->allow(['add', 'logout']);
    }

    public function index()
    {
        $this->set('datatables',1);
        $this->set('aseguradoras', $this->Aseguradoras->find('all'));
    }
    
    public function form($id=NULL)
    {
        $this->set('id',$id);

        //AÑADIR
        if(!$id){
            
            $aseguradora = $this->Aseguradoras->newEntity();
            if ($this->request->is('post')) {
                $aseguradora = $this->Aseguradoras->patchEntity($aseguradora, $this->request->data);
                if ($this->Aseguradoras->save($aseguradora)) {
                    $this->Flash->success(__('El departamento ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido añadir el departamento.'));
            }
            $this->set('departamento', $aseguradora);            
            
        //EDITAR    
        }else{
            
            $aseguradora = $this->Aseguradoras->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Aseguradoras->patchEntity($aseguradora, $this->request->data);
                if ($this->Aseguradoras->save($aseguradora)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('departamento', $aseguradora);            
        }
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $aseguradora = $this->Aseguradoras->get($id);
        if ($this->Aseguradoras->delete($aseguradora)) {
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
            if ($this->Aseguradoras->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>