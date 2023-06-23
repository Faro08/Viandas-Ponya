<?php
namespace App\Models;
use CodeIgniter\Model;

class usuarios_model extends Model 
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass',
         'perfil_id', 'direccion', 'baja', 'created_at'];
    
         public function getBuilderUsuarios(){
            $db = \Config\Database::connect();
            $builder = $db->table('usuarios');
            $builder->select('*');
            $builder->join('perfiles', 'perfil.id = usuarios.perfil_id');
            return $builder;
        }
}