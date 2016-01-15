<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientesHistoricosTable extends Table
{
    
    public function initialize(array $config)
    {    
        $this->belongsTo('Users', [
			'className' => 'Users',
			'foreignKey' => 'user_id',
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