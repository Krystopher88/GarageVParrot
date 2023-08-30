<?php

namespace App\Repository;

use App\Entity\OpeningShedule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OpeningShedule>
 *
 * @method OpeningShedule|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpeningShedule|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpeningShedule[]    findAll()
 * @method OpeningShedule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpeningSheduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpeningShedule::class);
    }

//    /**
//     * @return OpeningShedule[] Returns an array of OpeningShedule objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OpeningShedule
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
