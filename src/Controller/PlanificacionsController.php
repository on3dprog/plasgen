<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class PlanificacionsController extends AppController
{    
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Ordenes');
        $this->loadModel('Articulos');
        $this->loadModel('Maquinas');        
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
/****************************************************************/
    
    public function index()
    {
        $this->set('nombrepdf',"index"); //Nombre para el PDF a generar        
        $this->set('datatables',2);
        
        /*
        $maquinas = $this->Maquinas->find('all')
                                   ->where(['tipo'=>'EXTRUSORA']);
        $n_maquinas = $maquinas->count();                           
        $this->set('n_maquinas',$n_maquinas);
        $this->set('maquinas',$maquinas);
        */
        
        //ORDENES PENDIENTES        
        $pendientes = $this->Ordenes->find('all')
                                    ->where(['estado'=>'PREPARADO'])
                                    ->contain(['PedidosArticulos.Articulos']);
        $this->set('pendientes',$pendientes);
        
        /*
        $query_pendientes = "SELECT Articulo.nombre AS Nombre, Orden.OF, Orden.OM, Orden.duracion
                             FROM ordenes AS Orden
                             LEFT JOIN pedidos_articulos AS PedidoArticulo ON PedidoArticulo.id = Orden.pedidoArticulo_id 
                             LEFT JOIN articulos AS Articulo ON Articulo.id = PedidoArticulo.articulo_id 
                             WHERE Orden.estado = 'PREPARADO' ";
        $pendientes = $this->Ordenes->PedidosArticulos->Articulos->query($query_pendientes);
        $this->set('pendientes', $pendientes); */
        
        $planificadas=$this->Planificacions->find()
                                           ->contain(['Ordenes.PedidosArticulos.Articulos','Ordenes.PedidosArticulos.Pedidos'])
                                           ->where(['Ordenes.estado'=>'PLANIFICADO']);
        
        /*
        $planificadas = $this->Planificacions->find('all')                                             
                                             ->contain(['Ordenes.PedidosArticulos.Articulos' => function ($q){
                                                                                                    return $q
                                                                                                           ->where(['Ordenes.estado' => 'PLANIFICADO']);
                                                                                                }     
                                                       ]);
                 */                                      
        $this->set('planificadas',$planificadas);         
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

}
?>