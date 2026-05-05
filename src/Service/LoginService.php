<?php

namespace Src\Service;

use Src\Exception\LoginException;
use Src\Model\User;
use Src\Repository\Repository;
use Src\Repository\UserRepository;

class LoginService implements Service
{
    private Repository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function findByEmail(string $email, string $password): User
    {
        $user = $this->userRepository->findByEmail(email: $email);

        if(!password_verify($password, $user->getPassword())) {
            throw new LoginException("Usuário ou senha incorreta");
        }

        return $user;
    }


}
