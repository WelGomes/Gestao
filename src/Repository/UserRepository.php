<?php

namespace Src\Repository;

use Config\DAO;
use DateTime;
use Override;
use PDO;
use PDOException;
use Src\Enum\TypeUserEnum;
use Src\Exception\UserException;
use Src\Exception\UserRepositoryException;
use Src\Model\User;

class UserRepository extends DAO implements Repository
{

    public function __construct() {
        parent::__construct();
    }

    #[Override]
    public function findByEmail(string $email): User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);

        if(!$stmt->execute()) {
            throw new PDOException("Error ao acessar o banco de dados");
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!$user) {
            throw new UserException("Usuário não existe");
        }

        $userReturn = null;

        foreach($user as $value) {
            $userReturn = new User(
                firstName  : $value["first_name"],
                email      : $value["email"],
                password   : $value["password"],
                cpfCnpj    : $value["cpf_cnpj"],
                typeUser   : TypeUserEnum::from($value["type_user"]),
                lastName   : $value["last_name"],
                idUser     : $value["id_user"],
                dateCreated: new DateTime($value["date_created"])
            );
        }

        return $userReturn;
    }

}
