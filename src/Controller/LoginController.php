<?php

namespace Src\Controller;

use Src\Middleware\Auth;

class LoginController extends Controller
{
    private Auth $auth;

    public function __construct() {
        $this->auth = new Auth();
    }

    public function index(): void
    {
        $this->auth->generateCSRF();
        require_once __DIR__ . "../../../public/views/login.php";
    }

    public function show(): void
    {
        require_once __DIR__ . "../../../public/views/home.php";
    }
}
