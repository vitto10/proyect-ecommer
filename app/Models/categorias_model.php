<?php
namespace App\Models;
use CodeIgniter\Model;
class categorias_model extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['categoria'];
}