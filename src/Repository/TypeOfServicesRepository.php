<?php

namespace App\Repository;

use App\Entity\TypeOfServices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeOfServices>
 *
 * @method TypeOfServices|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeOfServices|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeOfServices[]    findAll()
 * @method TypeOfServices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeOfServicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeOfServices::class);
    }

//    /**
//     * @return TypeOfServices[] Returns an array of TypeOfServices objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeOfServices
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
