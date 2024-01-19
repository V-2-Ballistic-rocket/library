<?php

namespace App\Tests\Domain\Library\Book\BookAdder;

use App\Application\LibraryStoreManager\Postgres\LibraryPostgresManager;
use App\Domain\Library\Book\Book;
use App\Domain\Library\Book\BookAdder\BookAdder;
use App\Domain\Library\Book\Dto\CreateBookDto;
use App\Domain\Library\Book\Factory\BookFactory;
use PHPUnit\Framework\TestCase;

class BookAdderTest extends TestCase
{
    public function testAddNewBook()
    {
        // Создаем заглушки зависимостей
        $libraryStoreManagerMock = $this->getMockBuilder(LibraryPostgresManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $bookFactoryMock = $this->getMockBuilder(BookFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Создаем экземпляр класса BookAdder с заглушками зависимостей
        $bookAdder = new BookAdder($libraryStoreManagerMock, $bookFactoryMock);

        // Создаем CreateBookDto
        $createBookDto = new CreateBookDto(
            '451',
            'utopia * (-1)',
            8.8,
            []
        );

        // Создаем заглушку для созданной книги
        $bookMock = $this->getMockBuilder(Book::class)
            ->getMock();

        // Устанавливаем ожидания для методов заглушек
        $bookFactoryMock->expects($this->once())
            ->method('createBook')
            ->with($createBookDto)
            ->willReturn($bookMock);


        // Вызываем тестируемый метод
        $bookAdder->addNewBook($createBookDto);
    }
}
