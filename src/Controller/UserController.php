<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Service\UserService;
use App\Service\UserServiceImp;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class UserController
{

    private UserService $userService;
    
    function __construct(UserServiceImp $userServiceImp)
    {
        $this->userService = $userServiceImp;
    }

    // Route to return a random number
    #[Route('/random/number', methods:['GET'])]
    public function number(): Response
    {
        $number = random_int(0, 100);
        return new Response(
            'Number: ' . $number
        );
    }
    #[Route('user/{id}', methods:['GET'])]
    public function getUserById(int $id): Response
    {
        return new Response(json_encode($this->userService->getUserById($id)), Response::HTTP_OK);
    }

}
