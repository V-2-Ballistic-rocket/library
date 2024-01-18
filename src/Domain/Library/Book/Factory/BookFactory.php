<?php

namespace App\Domain\Library\Book\Factory;

use App\Domain\Library\Book\Book;
use App\Domain\Library\Book\Dto\CreateBookDto;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BookFactory
{
    public function __construct(
        private ValidatorInterface $validator
    )
    {}

    public function createBook(CreateBookDto $createBookDto): Book
    {
        $errors = $this->validator->validate($createBookDto);
        if(count($errors) > 0){
            throw new UserException($errors);
        }
        return new Book(
            $createBookDto->name,
            $createBookDto->description,
            $createBookDto->rating
        );
    }
}