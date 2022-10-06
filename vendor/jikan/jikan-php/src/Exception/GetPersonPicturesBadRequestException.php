<?php declare(strict_types=1);

namespace Jikan\JikanPHP\Exception;

class GetPersonPicturesBadRequestException extends BadRequestException
{
    public function __construct()
    {
        parent::__construct('Error: Bad request. When required parameters were not supplied.');
    }
}
