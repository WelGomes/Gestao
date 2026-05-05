<?php

namespace Src\Controller\API;

use Exception;
use PDOException;
use Src\Exception\LoginException;
use Src\Exception\UserException;
use Src\Middleware\Auth;
use Src\Service\LoginService;
use Src\Service\Service;

class LoginController
{
    private Service $loginService;
    private Auth    $auth;
    private string  $json;

    public function __construct() {
        $this->loginService = new LoginService();
        $this->auth         = new Auth();
        $this->json         = file_get_contents('php://input');
    }

    public function show(): void
    {   
        try {

            $data     = json_decode($this->json, true);
            
            $email    = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
            $password = $data["password"]; 
            $csrf     = $data["csrf"];
            
            if(is_null($email) || is_null($password)) {
                throw new Exception("Preencha os campos");
            }
            
            $this->auth->verifyCSRF(csrf: $csrf);

            $user = $this->loginService->findByEmail(email: $email, password: $password);

            $this->auth->initSession(userId: $user->getIdUser(), name: $user->getFirstName());

            echo json_encode(
                [
                    "status" => 200,
                    "login"  => true,
                ]
            );

        } catch(LoginException $ex) {

            echo json_encode(
                [
                    "status"  => 400,
                    "message" => $ex->getMessage()
                ]
            );

        } catch(PDOException $ex) {
            
            echo json_encode(
                [
                    "status"  => 500,
                    "message" => $ex->getMessage()
                ]
            );

        } catch(Exception $ex) {
            
            echo json_encode(
                [
                    "status"  => 500,
                    "message" => $ex->getMessage()
                ]
            );

        } 
    }

}