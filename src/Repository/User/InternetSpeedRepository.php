<?php

namespace App\Repository\User;

use App\Entity\User\InternetSpeed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InternetSpeed|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternetSpeed|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternetSpeed[]    findAll()
 * @method InternetSpeed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternetSpeedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InternetSpeed::class);
    }

//    /**
//     * @return InternetSpeed[] Returns an array of InternetSpeed objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InternetSpeed
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
