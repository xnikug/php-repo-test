<?php
// src/Service/UserServiceImp.php
namespace App\Service;

use App\Repository\UserRepository;
use App\DTO\Response\UserResponse;
use App\DTO\Mapper\UserMapper;

class UserServiceImp implements UserService
{
    private UserRepository $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function getUserById(int $id): ?UserResponse
    {
        return UserMapper::entityToDto($this->userRepository->getUserById($id));
    }
}