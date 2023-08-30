<?php

namespace App\Repository;

use App\Entity\VisitorReview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VisitorReview>
 *
 * @method VisitorReview|null find($id, $lockMode = null, $lockVersion = null)
 * @method VisitorReview|null findOneBy(array $criteria, array $orderBy = null)
 * @method VisitorReview[]    findAll()
 * @method VisitorReview[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisitorReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VisitorReview::class);
    }

//    /**
//     * @return VisitorReview[] Returns an array of VisitorReview objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VisitorReview
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
