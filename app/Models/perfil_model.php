<?php
namespace App\Models;
use CodeIgniter\Model;

class perfil_model extends Model 
{
    protected $table = 'perfiles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion', 'created_at'];

    public function getPerfiles(){
        return $this->findAll();    
    }
    
}