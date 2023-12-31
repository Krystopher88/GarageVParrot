<?php

namespace App\Repository;

use App\Entity\PictureVehicles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PictureVehicles>
 *
 * @method PictureVehicles|null find($id, $lockMode = null, $lockVersion = null)
 * @method PictureVehicles|null findOneBy(array $criteria, array $orderBy = null)
 * @method PictureVehicles[]    findAll()
 * @method PictureVehicles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PictureVehiclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PictureVehicles::class);
    }

//    /**
//     * @return PictureVehicles[] Returns an array of PictureVehicles objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PictureVehicles
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
