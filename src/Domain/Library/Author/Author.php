<?php

namespace App\Domain\Library\Author;

class Author
{
    public function __construct(
        private string $firsName = '',
        private string $lastName = '',
        private string $id = '',
        private array $booksId = []
    )
    {
    }



    public function getFirsName(): string
    {
        return $this->firsName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBooksId(): array
    {
        return $this->booksId;
    }

}