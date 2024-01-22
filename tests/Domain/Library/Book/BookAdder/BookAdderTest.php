<?php

namespace App\Tests\Domain\Library\Book\BookAdder;

use App\Application\LibraryStorageManager\Postgres\LibraryPostgresManager;
use App\Domain\Library\Book\Book;
use App\Domain\Library\Book\Dto\CreateBookDto;
use App\Domain\Library\Book\Factory\BookFactory;
use App\Domain\Library\Book\Storage\BookStorageManager;
use PHPUnit\Framework\TestCase;

class BookAdderTest extends TestCase
{
    public function testAddNewBook()
    {
        // ������� �������� ������������
        $libraryStoreManagerMock = $this->getMockBuilder(LibraryPostgresManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $bookFactoryMock = $this->getMockBuilder(BookFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        // ������� ��������� ������ BookStorageManager � ���������� ������������
        $bookAdder = new BookStorageManager($libraryStoreManagerMock, $bookFactoryMock);

        // ������� CreateBookDto
        $createBookDto = new CreateBookDto(
            '451',
            'utopia * (-1)',
            8.8,
            []
        );

        // ������� �������� ��� ��������� �����
        $bookMock = $this->getMockBuilder(Book::class)
            ->getMock();

        // ������������� �������� ��� ������� ��������
        $bookFactoryMock->expects($this->once())
            ->method('createBook')
            ->with($createBookDto)
            ->willReturn($bookMock);


        // �������� ����������� �����
        $bookAdder->addNewBook($createBookDto);
    }
}
