<?php
// src/Service/UserServiceImp.php
namespace App\Service;

use App\Repository\UserRepository;
use App\DTO\Response\UserResponse;
use App\DTO\Mapper\UserMapper;
use App\DTO\Request\UserRequest;
use Symfony\Component\HttpFoundation\Request;

class UserServiceImp implements UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById(int $id): ?UserResponse
    {
        return UserMapper::entityToResponseDto($this->userRepository->getUserById($id));
    }
    public function createUser(Request $request): ?UserResponse
    {
        $data = json_decode($request->getContent(), true);

        $name = $data['name'] ?? null;
        $isActive = $data['isActive'] ?? null;
        
        $userRequest = new UserRequest();
        $userRequest->setName($name);
        $userRequest->setIsActive($isActive);
        $user = UserMapper::requestDtoToEntity($userRequest);
        return UserMapper::entityToResponseDto($this->userRepository->createUser($user));
    }

}