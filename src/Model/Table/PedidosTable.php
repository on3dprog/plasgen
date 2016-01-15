<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PedidosTable extends Table
{
    
    public function initialize(array $config)
    {    
        //$this->table('clientes');
        $this->belongsTo('Clientes', [
			'className' => 'Clientes',
			'foreignKey' => 'cliente_id',
			'joinType' => 'LEFT',
		]);        
    }
    
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre');
    }
}
?>