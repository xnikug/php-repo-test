<?php
// src/Controller/UserController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserController
{

    // Route to return a random number
    #[Route('/random/number', methods:['GET'])]
    public function number(): Response
    {
        $number = random_int(0, 100);
        return new Response(
            'Number: ' . $number
        );
    }
}
