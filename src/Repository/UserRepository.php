<?php
declare(strict_types=1);

namespace App\Repository;

use App\Service\Database\DataBaseModel;

class UserRepository extends DataBaseModel
{
     public function __construct()
     {
         $this->table = 'user';
     }
}