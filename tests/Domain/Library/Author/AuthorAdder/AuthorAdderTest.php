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
        // ������� �������� ������������
        $libraryPostgresManagerMock = $this->getMockBuilder(LibraryPostgresManager::class)
            ->disableOriginalConstructor()
            ->getMock();
        $authorFactoryMock = $this->getMockBuilder(AuthorFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        // ������� ��������� ������ AuthorAuthor � ���������� ������������
        $authorAdder = new AuthorAdder($libraryPostgresManagerMock, $authorFactoryMock);

        // ������� CreateAdderDto
        $createAuthorDto = new CreateAuthorDto(
            'dmitriy',
            'rus'
        );

        // ������� �������� ��� ��������� �����
        $authorMock = $this->getMockBuilder(Author::class)
            ->getMock();

        // ������������� �������� ��� ������� ��������
        $authorFactoryMock->expects($this->once())
            ->method('createAuthor')
            ->with($createAuthorDto)
            ->willReturn($authorMock);

        // �������� ����������� �����
        $authorAdder->addNewAuthor($createAuthorDto);
    }
}
