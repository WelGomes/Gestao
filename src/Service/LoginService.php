<?php

namespace Src\Service;

use Src\Exception\UserException;
use Src\Repository\Repository;
use Src\Repository\UserRepository;

class LoginService implements Service
{
    private Repository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function findByEmail(string $email, string $password): bool
    {
        $user = $this->userRepository->findByEmail(email: $email);

        if(!password_verify($password, $user->getPassword())) {
            throw new UserException("Senha incorreta!");
        }

        return true;
    }


}
