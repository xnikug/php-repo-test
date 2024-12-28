<?php
// src/DTO/Mapper/UserMapper.php
namespace App\DTO\Mapper;

use App\Entity\User;
use App\DTO\Response\UserResponse;

class UserMapper
{
    public static function entityToDto(?User $user): ?UserResponse
    {
        if ($user == null)
        {
            return null;
        }
        $userResponse = new UserResponse();
        $userResponse->setId($user->getId());
        $userResponse->setName($user->getName());
        $userResponse->setIsActive($user->getIsActive());

        return $userResponse;
    }

    public static function dtoToEntity(?UserResponse $userResponse): ?User
    {
        if ($userResponse == null)
        {
            return null;
        }

        $user = new User();
        $user->setId($userResponse->getId());
        $user->setName($userResponse->getName());
        $user->setIsActive($userResponse->getIsActive());

        return $user;
    }
}
