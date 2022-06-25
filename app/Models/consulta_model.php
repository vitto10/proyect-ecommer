<?php
namespace App\Models;
use CodeIgniter\Model;
class consulta_model extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'email', 'descripcion', 'respuesta', 'respondido'];
}