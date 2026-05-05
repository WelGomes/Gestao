<?php

namespace Src\Middleware;

use Src\Exception\LoginException;

class Auth
{
    
    public function __construct() {}

    public function initSession(int $userId, string $name): void
    {
        session_set_cookie_params(
            [
                "lifetime" => 86400,
                "samesite" => 'Strict',
                "secure"   => true, 
                "httponly" => true,
            ]
        );

        session_start();

        session_regenerate_id(true);
        
        $_SESSION["user_id"]   = $userId; 
        $_SESSION["user_name"] = $name;
    }

    public function generateCSRF(): void
    {
        if(empty($_SESSION["csrf_token"])) {
            $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
        }
    }

    public function verifyCSRF(string $csrf): void
    {
        if($csrf != $_SESSION["csrf_token"]) {
            throw new LoginException("Error CSRF");
        }
    }

    public function verifySession(): void
    {
        if(!isset($_SESSION["user_name"])) {
            header("location: /");
            exit;
        }
    }


}