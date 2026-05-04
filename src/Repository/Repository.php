<?php 

namespace Src\Repository;

use Src\Model\User;

interface Repository
{
    public function findByEmail(string $email): User;
}