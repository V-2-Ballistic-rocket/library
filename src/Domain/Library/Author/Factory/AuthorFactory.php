<?php

namespace App\Domain\Library\Author\Factory;

use App\Domain\Library\Author\Author;
use App\Domain\Library\Author\Dto\CreateAuthorDto;
use App\Domain\Library\Author\Exceptions\IncorrectAuthorException;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AuthorFactory
{
    public function __construct(
        private ValidatorInterface $validator
    )
    {}

    public function createAuthor(CreateAuthorDto $createAuthorDto): Author
    {
        $errors = $this->validator->validate($createAuthorDto);
        if(count($errors) > 0){
            throw new IncorrectAuthorException($errors);
        }
        return new Author(
            $createAuthorDto->firstName,
            $createAuthorDto->lastName,
            Uuid::v1()
        );
    }
}