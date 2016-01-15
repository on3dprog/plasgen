<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

class ContenidosController extends AppController
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
        $this->set('mostrar_graficas',1);
        $this->render();
    }    
    

}

?>