<?php
// tests/Service/UserServiceTest.php
namespace App\Tests\Service;

use App\Service\UserService;
use PHPUnit\Framework\TestCase;
use App\DTO\Response\UserResponse;

class UserServiceTest extends TestCase
{
    public function testFindUserById()
    {
        $userService = new UserService();
        $result = $userService->findUserById(1);

        $this->assertInstanceOf(UserResponse::class, $result); // Correct
        // Add more assertions as needed
    }
}
