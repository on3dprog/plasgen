<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{   
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'No se ha especificado un NOMBRE DE USUARIO')
            ->notEmpty('password', 'No se ha especificado una CLAVE')
            ->notEmpty('role', 'No se ha especificado un PERFIL')
            ->add('role', 'inList', [
                'rule' => ['inList', ['ADMIN', 'COMERCIAL','COMPRAS','ADMINISTRACION','PRODUCCION','ALMACEN']],
                'message' => 'Por favor, introduce un PERFIL válido'
            ]);
    }
    
    public function isOwnedBy($userId)
    {
        return $this->exists(['user_id' => $userId]);
    }
}
?>