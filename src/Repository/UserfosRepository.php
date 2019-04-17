<?php

namespace App\Repository;

use App\Entity\Userfos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Userfos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userfos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userfos[]    findAll()
 * @method Userfos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserfosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Userfos::class);
    }

    // /**
    //  * @return Userfos[] Returns an array of Userfos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Userfos
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
