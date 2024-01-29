<?php

namespace App\Controller\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TokenController extends AbstractController
{
//    #[Route('/login', name: 'login')]
//    public function generateToken(Request $request, JWTTokenManagerInterface $jwtManager): JsonResponse
//    {
//        $payload = [
//            'sub' => 'anonymous', // Уникальный идентификатор анонимного пользователя
//            'exp' => (new \DateTime('+1 hour'))->getTimestamp() // Время истечения токена
//        ];
//
//        $token = $jwtManager->create($payload);
//
//        return new JsonResponse(['token' => $token]);
//    }
}