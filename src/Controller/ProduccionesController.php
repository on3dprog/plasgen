<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class ProduccionesController extends AppController
{    
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Ordenes');
        $this->loadModel('Maquinas');        
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
            if ($this->Maquinas->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }
    
/************************************************
** ORDENES DE FABRICACIÓN
*************************************************/

    public function indexOrdenes()
    {
        $this->set('nombrepdf',"index"); //Nombre para el PDF a generar
        
        $this->set('datatables',1);
        $query = "SELECT Orden.OF, Orden.OM, Articulo.referencia, Articulo.nombre AS Nombre, Orden.estado
                  FROM ordenes AS Orden
                  LEFT JOIN pedidos_articulos AS PedidoArticulo ON PedidoArticulo.id = Orden.pedido_articulo_id 
                  LEFT JOIN articulos AS Articulo ON Articulo.id = PedidoArticulo.articulo_id ";
        $this->set('fabricacions', $this->Ordenes->find('all'));
    }
    
    public function verordenpdf($id=NULL)
    {
        $this->set('nombrepdf',"orden_pdf"); //Nombre para el PDF a generar
        
        $this->set('id',$id);
        //$this->autoRender=false;        
    }
    
    public function form_ordenes($id=NULL)
    {
        $this->set('id',$id);

        //AÑADIR
        if(!$id){
            
            $fabricacion = $this->Fabricacions->newEntity();
            if ($this->request->is('post')) {
                $fabricacion = $this->Fabricacions->patchEntity($fabricacion, $this->request->data);
                if ($this->Fabricacions->save($fabricacion)) {
                    $this->Flash->success(__('El registro ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido añadir el registro.'));
            }
            $this->set('fabricacion', $fabricacion);            
            
        //EDITAR    
        }else{
            
            $fabricacion = $this->Fabricacions->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Fabricacions->patchEntity($fabricacion, $this->request->data);
                if ($this->Fabricacions->save($fabricacion)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('fabricacion', $fabricacion);            
        }
    }
    
    public function delete_orden($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $fabricacion = $this->Fabricacions->get($id);
        if ($this->Fabricacions->delete($fabricacion)) {
            $this->Flash->success(__('El registro con ID: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

/************************************************
**  MAQUINAS
*************************************************/
    public function indexMaquinas()
    {
        
        $this->set('datatables',1);
        $this->set('maquinas', $this->Maquinas->find('all'));
    }
    
    public function formMaquinas($id=NULL)
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
    
    public function deleteMaquinas($id=NULL)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $maquina = $this->Maquinas->get($id);
        if ($this->Maquinas->delete($maquina)) {
            $this->Flash->success(__('El registro con ID: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'indexMaquinas']);
        }
    }
    
/*************************************************/    

}

?>