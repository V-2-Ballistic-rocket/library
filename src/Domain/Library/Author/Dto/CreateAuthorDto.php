<?php

namespace App\Domain\Library\Author\Dto;

use Symfony\Component\Validator\Constraints as Assert;
readonly class CreateAuthorDto
{
    public function __construct(
        #[Assert\Length(
            min: 2,
            max: 60,
            minMessage: 'Название слишком короткое',
            maxMessage: 'Максимальная длина имени {{ limit }} символов',
        )]
        public string $firstName,
        #[Assert\Length(
            min: 2,
            max: 60,
            minMessage: 'Название слишком короткое',
            maxMessage: 'Максимальная длина фамилии {{ limit }} символов',
        )]
        public string $lastName
    )
    {}
}