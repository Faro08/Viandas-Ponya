<?php
namespace App\Models;
use CodeIgniter\Model;

class producto_model extends Model 
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_producto', 'imagen', 'categoria_id', 'costo', 'precio_venta',
         'stock', 'stock_min', 'eliminado', 'created_at'];
    
    public function getBuilderProductos(){
        $db = \Config\Database::connect();
        $builder = $db->table('productos');
        $builder->select('*');
        $builder->join('categorias', 'categoria.id = productos.categoria_id');
        return $builder;
    }

    public function getProducto($id =null){
        $builder = $this->getBuilderProductos();
        $builder-where('productos.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateStock($id = null, $stock_actual = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $builder->set('productos.stock', $stock_actual);
        $builder->update();
    }


}