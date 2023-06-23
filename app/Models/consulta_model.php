<?php
namespace App\Models;
use CodeIgniter\Model;

class consulta_model extends Model 
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'mensaje', 'leida', 'created_at'];

    public function getConsultas(){
        return $this->findAll();    
    }
    
}