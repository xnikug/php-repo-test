<?php
// src/Service/UserService.php
namespace App\Service;


interface UserService
{
    public function findUserById(int $id) : array;
}