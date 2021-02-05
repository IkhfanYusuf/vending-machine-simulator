<?php namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model
{
    protected $table      = 'login';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}