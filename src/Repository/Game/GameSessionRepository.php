<?php

namespace App\Repository\Game;

use App\Entity\Game\GameSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GameSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameSession[]    findAll()
 * @method GameSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameSessionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GameSession::class);
    }


}
