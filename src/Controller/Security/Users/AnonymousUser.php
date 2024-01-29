<?php

namespace App\Controller\Security\Users;

class AnonymousUser implements \Symfony\Component\Security\Core\User\UserInterface
{

    public function getRoles(): array
    {
        return [
            'ROLE_USER',
        ];
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return 'anonymous';
    }
}