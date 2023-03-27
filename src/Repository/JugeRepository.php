<?php

namespace App\Repository;

use App\Entity\Juges;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Juges>
 *
 * @method Juges|null find($id, $lockMode = null, $lockVersion = null)
 * @method Juges|null findOneBy(array $criteria, array $orderBy = null)
 * @method Juges[]    findAll()
 * @method Juges[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JugeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Juges::class);
    }

    public function save(Juges $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Juges $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function NomPrenomJuge() {
        $qb = $this->createQueryBuilder('j')
            ->select('j.nom_juge, j.prenom_juge');

        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Juges[] Returns an array of Juges objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Juges
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
