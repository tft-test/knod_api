<?php

namespace App\Repository;

use App\Entity\Signal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Signal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Signal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Signal[]    findAll()
 * @method Signal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignalRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Signal::class);
    }

    /**
     * @param Signal $entity
     * @param bool   $flush

     * @throws ORMException
     * @throws OptimisticLockException
     *
     * @return void
     */
    public function add(Signal $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @param Signal $entity
     * @param bool   $flush
     *
     * @throws ORMException
     * @throws OptimisticLockException
     *
     * @return void
     */
    public function remove(Signal $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Signal[] Returns an array of Signal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Signal
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
