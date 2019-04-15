<?php

namespace App\Repository;

use App\Entity\Planche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Planche|null find($id, $lockMode = null, $lockVersion = null)
 * @method Planche|null findOneBy(array $criteria, array $orderBy = null)
 * @method Planche[]    findAll()
 * @method Planche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlancheRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Planche::class);
    }

    // /**
    //  * @return Planche[] Returns an array of Planche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Planche
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
