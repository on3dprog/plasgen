<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class ArticulosController extends AppController
{   
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('ArticulosComponentes');
        $this->loadModel('Mprima');
    } 
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['add', 'logout']);
    }

    public function index()
    {
        $this->set('datatables',1);
        $this->set('articulos', $this->Articulos->find('all'));
    }
    
    public function form($id=NULL,$tabactiva=NULL)
    {
        $this->set('id',$id);
        
        $formatos = array('LAMINA'=>'LAMINA','SEMITUBO'=>'SEMITUBO','TUBO'=>'TUBO');
        $this->set('formatos',$formatos);
        
        $tipos = array('FABRICADO'=>'FABRICADO','MATERIAL'=>'MATERIAL','MERCADERIA'=>'MERCADERIA','SEMIELABORADO'=>'SEMIELABORADO');
        $this->set('tipos',$tipos);

        //AÑADIR
        if(!$id){
            
            $articulo = $this->Articulos->newEntity();
            if ($this->request->is('post')) {
                $articulo = $this->Articulos->patchEntity($articulo, $this->request->data);
                if ($result=$this->Articulos->save($articulo)) {
                    $this->Flash->success(__('El registro ha sido guardado.'));
                    return $this->redirect('/articulos/form/'.$result->id); //Redireccionamos a edición
                }
                $this->Flash->error(__('No se ha podido añadir el artículo.'));
            }
            $this->set('articulo', $articulo);
            
        //EDITAR    
        }else{
            
            //COMPONENTES
            $componentes = $this->ArticulosComponentes->find('all')
                                                      ->where(['articulo_id'=>$id]);
            $componentes->contain(['Mprimas']);
                                                      
            $this->set('componentes',$componentes);
            
            
            $articulo = $this->Articulos->get($id);
            if ($this->request->is(['post', 'put'])) {
                
                $this->Articulos->patchEntity($articulo, $this->request->data);
                if ($result=$this->Articulos->save($articulo)) {
                    $this->Flash->success(__('El registro ha sido actualizado.'));
                    
                    if($this->request->data['redireccion']==0){ //Guardar y cerrar
                        return $this->redirect(['action' => 'index']);
                    }else{ //Guardar y continuar
                        return $this->redirect('/articulos/form/'.$id.'#'.$this->request->data['tabactiva']); //Redireccionamos a edición con su tab activa
                    }
                }
                $this->Flash->error(__('No se ha podido actualizar el registro.'));
            }
        
            $this->set('articulo', $articulo);            
        }
    }
    
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $articulo = $this->Articulos->get($id);
        if ($this->Articulos->delete($articulo)) {
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
            if ($this->Articulos->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }

}

?>