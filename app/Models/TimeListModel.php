<?php

namespace App\Models;

use CodeIgniter\Model;

class TimeListModel extends Model
{
    protected $DBGroup = 'default';

    protected $table = 'TimeList';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['current_date','task_title', 'worked_start', 'worked_time', 'worked_end', 'task_desc', 'task_type' ,'fname', 'role'];

    protected $returnType = 'array';
}