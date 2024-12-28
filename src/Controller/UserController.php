<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\DTO\Request\UserRequest;
use App\DTO\Response\UserResponse;
use App\Service\UserService;
use App\Service\UserServiceImp;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

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
    
    #[Route('/user/{id}', methods:['GET'])]
    public function getUserById(int $id): Response
    {
        $userResponse = $this->userService->getUserById($id);
        if ($userResponse == null)
        {
            return new Response('404 Error', Response::HTTP_NOT_FOUND);
        }
        else
        {
            return new JsonResponse($userResponse, Response::HTTP_OK);
        }
    }

    #[Route('/add', methods:['POST'])]
    public function addUser(Request $request): Response
    {
        $userResponse = $this->userService->createUser($request);
        if ($userResponse == null)
        {
            return new Response('500 Error', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        else
        {
            return new JsonResponse($userResponse, Response::HTTP_OK);
        }
    }

}
