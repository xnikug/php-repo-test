<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\DTO\Response\UserResponse;
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
        $userResponse = $this->userService->getUserById($id);
        if ($userResponse == null){
            return new Response('', Response::HTTP_NOT_FOUND);
        }else{
            return new Response(json_encode($userResponse), Response::HTTP_OK);
        }
    }

}
