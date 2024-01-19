<?php

namespace App\Tests\Domain\Library\Author\Factory;

use App\Domain\Library\Author\Author;
use App\Domain\Library\Author\Dto\CreateAuthorDto;
use App\Domain\Library\Author\Factory\AuthorFactory;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

class AuthorFactoryTest extends TestCase
{
    public function testCreateAuthor()
    {
        $validator = Validation::createValidator();
        $factory = new AuthorFactory($validator);

        $dto = new CreateAuthorDto(
            'anton',
            'tekshin'
        );


        $author = $factory->createAuthor($dto);

        $this->assertInstanceOf(Author::class, $author);
        $this->assertEquals("anton", $author->getFirstName());
        $this->assertEquals("tekshin", $author->getLastName());
    }
}