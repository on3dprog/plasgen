<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MaquinasTable extends Table
{    
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre')
			->add('tipo', 'inList', [
									 'rule' => ['inList', ['EXTRUSORA', 'IMPRESION']],
									 'message' => 'Por favor, introduce un TIPO válido'
								    ]);
    }
}
?>