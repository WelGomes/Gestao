<?php

namespace Src\Model;

use DateTime;
use Src\Enum\TypeUserEnum;

class User
{
    /**
     * @var int id_login_log
     */
    private ?int $idUser;

    /**
     * @var string first_name 
     */
    private string $firstName;

    /**
     * @var string last_name 
     */
    private ?string $lastName;
    
    /**
     * @var string email 
     */
    private string $email;
    
    /**
     * @var string password 
     */
    private string $password;
    
    /**
     * @var string cpf_cnpj 
     */
    private string $cpfCnpj;
    
    /**
     * @var TypeUserEnum type_user 
     */
    private TypeUserEnum $typeUser;
    
    /**
     * @var DateTime date_created 
     */
    private ?DateTime $dateCreated;

    public function __construct(
         string       $firstName,
         string       $email,
         string       $password,
         string       $cpfCnpj,
         TypeUserEnum $typeUser,
        ?string       $lastName    = null,
        ?int          $idUser      = null,
        ?DateTime     $dateCreated = null
    )
    {
        $this->firstName   = $firstName;
        $this->email       = $email;
        $this->password    = $password;
        $this->cpfCnpj     = $cpfCnpj;
        $this->typeUser    = $typeUser;
        $this->lastName    = $lastName;
        $this->idUser      = $idUser;
        $this->dateCreated = $dateCreated;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getCpfCnpj(): string
    {
        return $this->cpfCnpj;
    }
    public function setCpfCnpj(string $cpfCnpj): void
    {
        $this->cpfCnpj = $cpfCnpj;
    }

    public function getTypeUser(): TypeUserEnum
    {
        return $this->typeUser;
    }
    public function setTypeUser(TypeUserEnum $typeUser): void
    {
        $this->typeUser = $typeUser;
    }

    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }
    public function setDateCreated(DateTime $dateCreated): void
    {
        $this->dateCreated = $dateCreated;
    }
}
