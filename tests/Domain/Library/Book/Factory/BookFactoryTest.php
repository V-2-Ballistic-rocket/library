<?php

namespace App\Tests\Domain\Library\Book\Factory;

use App\Domain\Library\Book\Book;
use App\Domain\Library\Book\Dto\CreateBookDto;
use App\Domain\Library\Book\Factory\BookFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class BookFactoryTest extends TestCase
{
    public function testSomething(): void
    {
        $validator = Validation::createValidator();
        $factory = new BookFactory($validator);

        $dto = new CreateBookDto(
            'disgardium 2',
            'vr & mmorpg',
            8.2
        );

        $book = $factory->createBook($dto);

        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals('disgardium 2', $book->getName());
        $this->assertEquals('vr & mmorpg', $book->getDescription());
        $this->assertEquals(8.2, $book->getRating());
    }
}
