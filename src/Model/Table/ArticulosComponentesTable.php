<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticulosComponentesTable extends Table
{    
    public function initialize(array $config)
    {    
        $this->table('articulos_componentes');
        
        $this->belongsTo('Mprimas',[
			                        'className' => 'Mprimas',
			                        'foreignKey' => 'mprima_id',
			                        'joinType' => 'LEFT',
		                           ]
                        );
                        /*
        $this->hasMany('Mprimas',[
			                        'className' => 'Mprimas',
			                        'foreignKey' => 'mprima_id',
			                        'joinType' => 'LEFT',
		                           ]); */
    } 
    
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre')
            ->notEmpty('tipo', 'No se ha especificado un TIPO');
    }
}
?>