<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Request;

class ClientesController extends AppController
{   
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('ClientesDireccions');
        $this->loadModel('ClientesHistoricos');
        $this->loadModel('Pedidos');
        //Aseguradoras_clientes
    } 
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
        //$this->Auth->allow(['add', 'logout']);
    }

    public function index()
    {
        $this->set('datatables',1);
        $this->set('clientes', $this->Clientes->find('all'));
    }
    
    public function form($id=NULL)
    {
        $this->set('id',$id);
                
        //--- AÑADIR ---
        if(!$id){
            
            $cliente = $this->Clientes->newEntity();
            if ($this->request->is('post')) {
                $cliente = $this->Clientes->patchEntity($cliente, $this->request->data);
                if ($this->Clientes->save($cliente)) {
                    $this->Flash->success(__('El registro ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido añadir el registro.'));
            }
            $this->set('cliente', $cliente);            
            
        //--- EDITAR ---   
        }else{
            
            //PEDIDOS
            $pedidos = $this->Pedidos->find('all')
                                     ->where(['cliente_id'=>$id]);
            $this->set('pedidos',$pedidos);
            
            //DIRECCIONES
            $direcciones = $this->ClientesDireccions->find('all')
                                                    ->where(['cliente_id'=>$id]);
            $this->set('direcciones',$direcciones);
            
            //HISTORICOS
            $historicos = $this->ClientesHistoricos->find('all')
                                                   ->where(['cliente_id'=>$id])
                                                   ->contain(['Users']);
            $this->set('historicos',$historicos); 
            
            $cliente = $this->Clientes->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Clientes->patchEntity($cliente, $this->request->data);
                if ($this->Clientes->save($cliente)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('cliente', $cliente);            
        }
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
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
            if ($this->Clientes->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>