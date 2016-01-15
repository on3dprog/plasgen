<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AlmacenmprimasTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('nombre', 'No se ha especificado un nombre');
    }
}
?>