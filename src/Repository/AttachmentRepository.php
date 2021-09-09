<?php

namespace App\Repository;

use App\Entity\Attachment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Attachment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attachment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attachment[]    findAll()
 * @method Attachment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttachmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Attachment::class);
    }

    // /**
    //  * @return Attachment[] Returns an array of Attachment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Attachment
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAttachmentsToRemove(array $fileNames, ?int $article_id)
    {
        $qb = $this->createQueryBuilder('a');

        $qb
            ->select()
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->eq('a.article', $article_id),
                    $qb->expr()->notIn('a.fileName', $fileNames)
                )

            );

        return $qb->getQuery()->getResult();
    }

    public function removeAttachments(array $fileNames)
    {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->delete()
            ->where(
                $qb->expr()->In('a.fileName', $fileNames)
            );

        return $qb->getQuery()->getResult();
    }

}
