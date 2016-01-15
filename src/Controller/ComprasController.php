<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class ComprasController extends AppController
{   
    
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Almacenmprimas');        
        $this->loadModel('Clientes');        
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
        //$this->Auth->allow(['add', 'logout']);
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
            if ($this->Compras->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

/************************************************
**  ALMACENES M.PRIMAS
*************************************************/
    public function indexAlmacenesmprimas()
    {        
        $this->set('datatables',1);
        $this->set('almacenmprimas', $this->Almacenmprimas->find('all'));
    }
    
    public function formAlmacenesmprimas($id=NULL)
    {
        $this->set('id',$id);
        $tipos = array('EXTRUSORA'=>'EXTRUSORA','IMPRESION'=>'IMPRESION');
        $this->set('tipos',$tipos);

        //AÑADIR
        if(!$id){
            
            $maquina = $this->Maquinas->newEntity();
            if ($this->request->is('post')) {
                $maquina = $this->Maquinas->patchEntity($maquina, $this->request->data);
                if ($this->Maquinas->save($maquina)) {
                    $this->Flash->success(__('El maquina ha sido guardado.'));
                    return $this->redirect(['action' => 'indexMaquinas']);
                }
                $this->Flash->error(__('No se ha podido añadir el maquina.'));
            }
            $this->set('maquina', $maquina);            
            
        //EDITAR    
        }else{
            
            $maquina = $this->Maquinas->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Maquinas->patchEntity($maquina, $this->request->data);
                if ($this->Maquinas->save($maquina)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'indexMaquinas']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('maquina', $maquina);            
        }
    }
    
    public function deletemprimas($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $maquina = $this->Maquinas->get($id);
        if ($this->Maquinas->delete($maquina)) {
            $this->Flash->success(__('El registro con ID: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'indexMaquinas']);
        }
    }

/************************************************
**  COMPRAS
*************************************************/   

    public function index()
    {
        $this->set('datatables',1);
        $this->set('compras', $this->Compras->find('all'));
    }
    
    public function form($id=NULL)
    {
        $this->set('id',$id);

        //AÑADIR
        if(!$id){
            
            $compra = $this->Compras->newEntity();
            if ($this->request->is('post')) {
                $compra = $this->Compras->patchEntity($compra, $this->request->data);
                if ($this->Compras->save($compra)) {
                    $this->Flash->success(__('El registro ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido añadir el registro.'));
            }
            $this->set('compra', $compra);            
            
        //EDITAR    
        }else{
            
            $compra = $this->Compras->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Compras->patchEntity($compra, $this->request->data);
                if ($this->Compras->save($compra)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('compra', $compra);            
        }
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $compra = $this->Compras->get($id);
        if ($this->Compras->delete($compra)) {
            $this->Flash->success(__('El registro con ID: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

}

?>