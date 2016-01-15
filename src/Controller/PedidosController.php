<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Validation\Validator;

class PedidosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Pedidos');
        $this->loadModel('PedidosArticulos');
    } 
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
        //$this->Auth->allow(['add', 'logout']);
    }

    public function index()
    {
        $this->set('datatables',1);
        
        $results = $this->Pedidos->find('all');
        $results->contain(['Clientes']);
        
        /*
        $query = "SELECT Pedido.*, Cliente.nombre, Articulo.nombre AS Anombre
                  FROM pedidos AS Pedido
                  LEFT JOIN pedidos_articulos AS PArticulo ON PArticulo.pedido_id = Pedido.id
                  LEFT JOIN articulos AS Articulo ON Articulo.id = PArticulo.articulo_id
                  LEFT JOIN clientes AS Cliente ON Cliente.id = Pedido.cliente_id ";
        $results = $this->Pedidos->query($query);
        */
        $this->set('pedidos', $results);
    }
    
    public function form($id=NULL)
    {
        $this->set('id',$id);

        //AÑADIR
        if(!$id){
            
            $pedido = $this->Pedidos->newEntity();
            if ($this->request->is('post')) {
                $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
                if ($this->Pedidos->save($pedido)) {
                    $this->Flash->success(__('El pedido ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido añadir el pedido.'));
            }
            $this->set('pedido', $pedido);            
            
        //EDITAR    
        }else{
            
            $pedido = $this->Pedidos->get($id);
            if ($this->request->is(['post', 'put'])) {
                $this->Pedidos->patchEntity($pedido, $this->request->data);
                if ($this->Pedidos->save($pedido)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('pedido', $pedido);            
        }
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('El registro con ID: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    
    public function pedidopdf($id=NULL)
    {
        $this->set('nombrepdf',"pedido"); //Nombre para el PDF a generar        
        
        $datos_pedido = $this->Pedidos->find('all')
                                      ->where(['cliente_id'=>$id])
                                      ->contain(['Clientes']);
        $this->set('datos_pedido',$datos_pedido);
        
        $elementos_pedido = $this->PedidosArticulos->find()
                                                   ->contain(['Articulos'])
                                                   ->where(['pedido_id'=>$id]);
        $this->set('elementos_pedido',$elementos_pedido);
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
            if ($this->Pedidos->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>