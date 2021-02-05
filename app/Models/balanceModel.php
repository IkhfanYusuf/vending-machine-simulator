<?php namespace App\Models;

use CodeIgniter\Model;

class balanceModel extends Model
{
    protected $table      = 'balance';
    protected $primaryKey = 'id';
    protected $allowedFields = ['balance'];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}