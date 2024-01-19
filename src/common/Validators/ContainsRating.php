<?php
namespace App\common\Validators;

use Symfony\Component\Validator\Attribute\HasNamedArguments;
use Symfony\Component\Validator\Constraint;

#[\Attribute]
class ContainsRating extends Constraint
{
    public $message = 'Рейтинг  "{{ string }}" указан некорректно.';

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