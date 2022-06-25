<?php
namespace App\Models;
use CodeIgniter\Model;
class ventas_user_model extends Model
{
    protected $table = 'ventas_resumen';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_usuario', 'importeTotal', 'fecha'];
}