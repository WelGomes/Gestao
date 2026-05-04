<?php

namespace Src\Controller\API;

use Exception;
use PDOException;
use Src\Exception\UserException;
use Src\Service\LoginService;
use Src\Service\Service;

class UserAPIController
{
    private Service $loginService;
    private string  $json;

    public function __construct() {
        $this->loginService = new LoginService();
        $this->json         = file_get_contents('php://input');
    }

    public function show(): void
    {   
        try {

            $data     = json_decode($this->json, true);
            
            $email    = filter_var($data["email"], FILTER_SANITIZE_EMAIL);
            $password = $data["password"]; 
            
            if(is_null($email) || is_null($password)) {
                throw new Exception("Preencha os campos");
            }

            $dados = $this->loginService->findByEmail(email: $email, password: $password);

            echo json_encode(
                [
                    "status" => 200,
                    "login"  => true
                ]
            );

        } catch(UserException $ex) {

            echo json_encode(
                [
                    "status"  => 200,
                    "message" => $ex->getMessage()
                ]
            );

        } catch(PDOException $ex) {
            
            echo json_encode(
                [
                    "status"  => 400,
                    "message" => $ex->getMessage()
                ]
            );

        } catch(Exception $ex) {
            
            echo json_encode(
                [
                    "status"  => 400,
                    "message" => $ex->getMessage()
                ]
            );

        } 
    }

}