<?php

namespace App\Tests\Domain\Library\Author\AuthorAdder;

use App\Application\LibraryStoreManager\Postgres\LibraryPostgresManager;
use App\Domain\Library\Author\Author;
use App\Domain\Library\Author\AuthorAdder\AuthorAdder;
use App\Domain\Library\Author\Dto\CreateAuthorDto;
use App\Domain\Library\Author\Factory\AuthorFactory;
use PHPUnit\Framework\TestCase;

class AuthorAdderTest extends TestCase
{
    public function testSomething(): void
    {
        // Создаем заглушки зависимостей
        $libraryPostgresManagerMock = $this->getMockBuilder(LibraryPostgresManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $authorFactoryMock = $this->getMockBuilder(AuthorFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Создаем экземпляр класса AuthorAuthor с заглушками зависимостей
        $authorAdder = new AuthorAdder($libraryPostgresManagerMock, $authorFactoryMock);

        // Создаем CreateAdderDto
        $createAuthorDto = new CreateAuthorDto(
            'dmitriy',
            'rus'
        );

        // Создаем заглушку для созданной книги
        $authorMock = $this->getMockBuilder(Author::class)
            ->getMock();

        // Устанавливаем ожидания для методов заглушек
        $authorFactoryMock->expects($this->once())
            ->method('createAuthor')
            ->with($createAuthorDto)
            ->willReturn($authorMock);

        // Вызываем тестируемый метод
        $authorAdder->addNewAuthor($createAuthorDto);
    }
}
