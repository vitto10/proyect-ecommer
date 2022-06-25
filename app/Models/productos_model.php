<?php
namespace App\Models;
use CodeIgniter\Model;
class productos_model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_categoria', 'nombre_prod', 'precio_compra', 'precio_venta', 'stock', 'min_stock', 'imagen', 'eliminado'];
}