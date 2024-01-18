<?php
namespace App\common\Validators;

use Symfony\Component\Validator\Attribute\HasNamedArguments;

#[\Attribute]
class ContainsRating extends \Symfony\Component\Validator\Constraint
{
    public $message = 'Рейтинг  "{{ value }}" указан некорректно.';

    #[HasNamedArguments]
    public function __construct(
        array $groups = null,
        mixed $payload = null,
    ) {
        parent::__construct([], $groups, $payload);
    }
    public function validatedBy(): string
    {
        return static::class.'Validator';
    }
}