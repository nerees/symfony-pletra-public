<?php

namespace App\Repository;

use App\Entity\Anketa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Anketa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anketa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anketa[]    findAll()
 * @method Anketa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnketaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Anketa::class);
    }

     /**
      * @return Anketa[] Returns an array of Anketa objects
      */

    public function findByUser($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.user_id = :val')
            ->setParameter('val', $value)
            ->orderBy('a.created_at', 'ASC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult()
        ;
    }

   /* public function findById($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $value)
            ->orderBy('a.created_at', 'ASC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult()
            ;
    }*/


    /*
    public function findOneBySomeField($value): ?Anketa
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
