<?php
// src/Service/UserService.php
namespace App\Service;

use App\DTO\Response\UserResponse;
use Symfony\Component\HttpFoundation\Request;

interface UserService
{
    public function getUserById(int $id): ?UserResponse;
    public function createUser(Request $userRequest): ?UserResponse;
}