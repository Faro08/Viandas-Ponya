<?php
namespace App\Models;
use CodeIgniter\Model;

class categorias_model extends Model 
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion', 'created_at'];
    
}