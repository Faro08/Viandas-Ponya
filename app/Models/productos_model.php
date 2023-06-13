<?php
namespace App\Models;
use CodeIgniter\Model;

class productos_model extends Model 
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_producto', 'imagen', 'categoria_id', 'costo', 'precio_venta',
         'stock', 'stock_min', 'eliminado', 'created_at'];
    
}