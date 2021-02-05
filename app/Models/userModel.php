<?php namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table      = 'drink';
    protected $primaryKey = 'id';
    protected $allowedFields = ['stock', 'buy'];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}