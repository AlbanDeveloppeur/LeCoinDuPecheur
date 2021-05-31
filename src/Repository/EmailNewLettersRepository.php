<?php

namespace App\Repository;

use App\Entity\EmailNewLetters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmailNewLetters|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailNewLetters|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailNewLetters[]    findAll()
 * @method EmailNewLetters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailNewLettersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmailNewLetters::class);
    }

    // /**
    //  * @return EmailNewLetters[] Returns an array of EmailNewLetters objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmailNewLetters
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
