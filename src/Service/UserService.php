<?php
// src/Service/UserService.php
namespace App\Service;

use App\DTO\Response\UserResponse;


interface UserService
{
    public function findUserById(int $id): UserResponse;
}