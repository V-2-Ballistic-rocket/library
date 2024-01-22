<?php

namespace App\Tests\Domain\Library\Book\Factory;

use App\Domain\Library\Book\Book;
use App\Domain\Library\Book\Dto\CreateBookDto;
use App\Domain\Library\Book\Factory\BookFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Validation;

class BookFactoryTest extends TestCase
{
    /**
     * @dataProvider createBookDtoProvider
     */
    public function testSomething(CreateBookDto $createBookDto): void
    {
        $validator = Validation::createValidator();
        $factory = new BookFactory($validator);

        $book = $factory->createBook($createBookDto);

        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals($createBookDto->name, $book->getName());
        $this->assertEquals($createBookDto->description, $book->getDescription());
        $this->assertEquals($createBookDto->rating, $book->getRating());
        $this->assertEquals($createBookDto->price, $book->getPrice());
        $this->assertEquals($createBookDto->authorsName, $book->getAuthorsName());
    }

    public function createBookDtoProvider(): array
    {
        return [
            [
                new CreateBookDto(
                'book name',
                'book description',
                8,
                '400,00',
                ['Nestor Shilo']
                )
            ]
        ];
    }
}
