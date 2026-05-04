<?php

namespace Src\Controller;

class UserController extends Controller
{

    public function index(): void
    {
        require_once __DIR__ . "../../../public/views/login.php";
    }

    public function show(): void
    {
        require_once __DIR__ . "../../../public/views/home.php";
    }

}
