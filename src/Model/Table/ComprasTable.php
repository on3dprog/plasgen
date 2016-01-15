<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ComprasTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre')
			->add('tipo', 'inList', [
									 'rule' => ['inList', ['XX', 'YY']],
									 'message' => 'Por favor, introduce un XX válido'
								    ]);
    }
}
?>