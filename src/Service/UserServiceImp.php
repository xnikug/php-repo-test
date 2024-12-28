<?php
// src/Service/UserServiceImp.php
namespace App\Service;

use App\Repository\UserRepository;
use App\DTO\Response\UserResponse;

class UserServiceImp implements UserService
{
    private UserRepository $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function findUserById(int $id): array
    {
        return [];
    }
}