<?php

namespace App\Repository;

use App\Entity\Competiteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Competiteur>
 *
 * @method Competiteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competiteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competiteur[]    findAll()
 * @method Competiteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetiteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competiteur::class);
    }

    public function save(Competiteur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Competiteur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findCompetiteursRank() {
        return $this->createQueryBuilder('c')
            ->select('c.nom_competiteur, c.prenom_competiteur, c.notes_competiteur')
            ->orderBy('c.notes_competiteur', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function classementCompet($competitionId = null) {
        $qb = $this->createQueryBuilder('ct');

        $qb->select('c.nom_competition', 'ct.nom_competiteur', 'ct.prenom_competiteur', 'ct.notes_competiteur')
            ->join('App\Entity\Competition', 'c', 'WITH', 'c.id_competition = ct.id_competition')
            ->orderBy('c.nom_competition', 'ASC')
            ->addOrderBy('ct.notes_competiteur', 'DESC');

        if ($competitionId !== null) {
            $qb->andWhere('c.id = :id_competition')
                ->setParameter('id_competition', $competitionId);
        }


        return $qb->getQuery()->getResult();
    }

//    /**
//     * @return Competiteur[] Returns an array of Competiteur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Competiteur
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
