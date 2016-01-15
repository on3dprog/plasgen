<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrdenesTable extends Table
{
    
    public function initialize(array $config)
    {    
        $this->table('ordenes');
        
        $this->belongsTo('PedidosArticulos', [
			                          'className' => 'PedidosArticulos',
			                          'foreignKey' => 'pedidoArticulo_id',
			                          'joinType' => 'LEFT',
		                             ]
                        );
                        /*
        $this->belongsTo('ArticulosComponentes', [
			                          'className' => 'ArticulosComponentes',
			                          'foreignKey' => 'articulo_id',
			                          'joinType' => 'LEFT',
		                             ]
                        );
        */         
    }
    
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre');
    }
}
?>