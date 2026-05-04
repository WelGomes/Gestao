<?php 

namespace Src\Model;

use DateTime;

class LoginLog
{
    /**
     * @var int id_login_log
    */
    private ?int $idLoginLog;

    /**
     * @var int id_user
    */
    private ?User $idUser;

    /**
     * @var string email
    */
    private string $email;

    /**
     * @var DateTime data_login 
    */
    private DateTime $dateLogin;

    /**
     * @var string user_agent
    */
    private string $userAgent;

    /**
     * @var string ip
    */
    private string $ip;

    /**
     * @var bool sucess
    */
    private bool $sucess;

    public function __construct(
        string   $email,
        DateTime $dateLogin,
        string   $userAgent,
        string   $ip,
        bool     $sucess,
       ?int      $idLoginLog = null,
       ?User     $idUser = null
    )
    {
        $this->email      = $email;
        $this->dateLogin  = $dateLogin;
        $this->userAgent  = $userAgent;
        $this->ip         = $ip;
        $this->sucess     = $sucess;
        $this->idLoginLog = $idLoginLog;
        $this->idUser     = $idUser;
    }

    public function getIdLoginLog(): int
    {
        return $this->idLoginLog;
    }
    public function setIdLoginLog(int $idLoginLog): void
    {
        $this->idLoginLog = $idLoginLog;
    }

    public function getIdUser(): User
    {
        return $this->idUser;
    }
    public function setIdUser(User $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getDataLogin(): DateTime
    {
        return $this->dateLogin;
    }
    public function setDataLogin(DateTime $dateLogin): void
    {
        $this->dateLogin = $dateLogin;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }
    public function setUserAgent(string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }

    public function getIp(): string
    {
        return $this->ip;
    }
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }
    
    public function getSucess(): bool
    {
        return $this->sucess;
    }
    public function setSucess(bool $sucess): void
    {
        $this->sucess = $sucess;
    }

}
