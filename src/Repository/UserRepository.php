<?php
// src/Repository/UserRepository.php
namespace App\Repository;

use App\DTO\Mapper\UserMapper;
use App\DTO\Response\UserResponse;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getUserById(int $id): ?User
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT u
            FROM App\Entity\User u
            WHERE u.id = :id'
        )->setParameter('id', $id);
        return $query->getOneOrNullResult();
    }
    public function createUser(User $user): ?User
    {
        // Get the EntityManager
        $entityManager = $this->getEntityManager();

        // Persist the new User entity
        $entityManager->persist($user);

        // Flush to save the entity to the database
        $entityManager->flush();

        // Return the created user's details
        return $user;
    }
}