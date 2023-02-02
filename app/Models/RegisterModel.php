<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $DBGroup = 'default';

    protected $table = 'Register';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['fname', 'lname', 'email', 'password', 'role'];

    protected $returnType = 'array';
}