<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClientesDireccionsTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre')
            ->add('tipo', 'inList', [
                  'rule' => ['inList', ['ENVIO', 'FACTURA','COBRO']],
                  'message' => 'Por favor, introduce un TIPO v�lido'
            ]);
    }
}
?>