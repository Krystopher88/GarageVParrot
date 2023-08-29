<?php

namespace App\Repository;

use App\Entity\UsedVehicles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsedVehicles>
 *
 * @method UsedVehicles|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsedVehicles|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsedVehicles[]    findAll()
 * @method UsedVehicles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsedVehiclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsedVehicles::class);
    }

//    /**
//     * @return UsedVehicles[] Returns an array of UsedVehicles objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UsedVehicles
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
