<?php
namespace App\Models;
use CodeIgniter\Model;

class ventas_cabecera_model extends Model 
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fecha', 'usuario_id', 'total_venta', 'created_at'];
    
}