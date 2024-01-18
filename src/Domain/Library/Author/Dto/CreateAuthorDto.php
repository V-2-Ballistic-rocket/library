<?php

namespace App\Domain\Library\Author\Dto;

use Symfony\Component\Validator\Constraints as Assert;
readonly class CreateAuthorDto
{
    public function __construct(
        #[Assert\Length(
            min: 2,
            max: 60,
            minMessage: '�������� ������� ��������',
            maxMessage: '������������ ����� ����� {{ limit }} ��������',
        )]
        public string $firstName,
        #[Assert\Length(
            min: 2,
            max: 60,
            minMessage: '�������� ������� ��������',
            maxMessage: '������������ ����� ������� {{ limit }} ��������',
        )]
        public string $lastName
    )
    {}
}