<?php
// src/DTO/Mapper/UserMapper.php
namespace App\DTO\Mapper;

use App\DTO\Request\UserRequest;
use App\Entity\User;
use App\DTO\Response\UserResponse;

class UserMapper
{
    public static function entityToResponseDto(?User $user): ?UserResponse
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

    public static function responseDtoToEntity(?UserResponse $userResponse): ?User
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

    public static function entityToRequestDto(?User $user): ?UserRequest
    {
        if ($user == null)
        {
            return null;
        }
        $userRequest = new UserRequest();
        $userRequest->setName($user->getName());
        $userRequest->setIsActive($user->getIsActive());

        return $userRequest;
    }

    public static function requestDtoToEntity(?UserRequest $userRequest): ?User
    {
        if ($userRequest == null)
        {
            return null;
        }

        $user = new User();
        $user->setName($userRequest->getName());
        $user->setIsActive($userRequest->getIsActive());

        return $user;
    }
}
