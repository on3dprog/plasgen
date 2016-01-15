<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PlanificacionsTable extends Table
{
    
    public function initialize(array $config)
    {    
        $this->table('planificaciones');
        $this->belongsTo('Ordenes', [
			                          'className' => 'Ordenes',
			                          'foreignKey' => 'orden_id',
                                      'joinType' => 'LEFT',
		                            ]);
        $this->belongsTo('Maquinas', [
			                          'className' => 'Maquinas',
			                          'foreignKey' => 'maquina_id',
                                      'joinType' => 'LEFT',
		                            ]);                                    
    }
    
    /*
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre');
            /*
			->add('tipo', 'inList', [
									 'rule' => ['inList', ['XX', 'YY']],
									 'message' => 'Por favor, introduce un XX válido'
								    ])
    } */
}
?>