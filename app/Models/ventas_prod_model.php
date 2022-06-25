<?php
namespace App\Models;
use CodeIgniter\Model;
class ventas_prod_model extends Model
{
    protected $table = 'venta_producto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_factura', 'id_producto', 'cantidad', 'precio_venta', 'subtotal'];
}