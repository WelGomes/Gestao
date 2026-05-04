<?php

namespace Src\Exception;

use Exception;
use Throwable;
use Override;

class UserException extends Exception
{

    public function __construct(string $message = "", int $code = 0, Throwable|null $previous = null)
    {
        return parent::__construct($message, $code, $previous);
    }

    #[Override]
    public function __toString(): string
    {
        return $this->getMessage();
    }

}