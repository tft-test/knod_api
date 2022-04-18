<?php

namespace App\Repository;

use App\Entity\EventTaxonomy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventTaxonomy|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventTaxonomy|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventTaxonomy[]    findAll()
 * @method EventTaxonomy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventTaxonomyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventTaxonomy::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(EventTaxonomy $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(EventTaxonomy $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return EventTaxonomy[] Returns an array of EventTaxonomy objects
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
    public function findOneBySomeField($value): ?EventTaxonomy
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
