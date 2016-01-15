<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PedidosArticulosTable extends Table
{
    
    public function initialize(array $config)
    {  
        $this->belongsTo('Pedidos',[
			                        'className' => 'Pedidos',
			                        'foreignKey' => 'pedido_id',
			                        'joinType' => 'LEFT',
		                           ]
                        );
                        
        $this->belongsTo('Articulos',[
			                        'className' => 'Articulos',
			                        'foreignKey' => 'articulo_id',
			                        'joinType' => 'LEFT',
		                           ]
                        );
    }
    /*
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre')
			->add('tipo', 'inList', [
									 'rule' => ['inList', ['XX', 'YY']],
									 'message' => 'Por favor, introduce un XX válido'
								    ]);
    }
    */
}
?>