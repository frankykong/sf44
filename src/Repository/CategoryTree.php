<?php

namespace App\Repository;

use App\Entity\Category;
use App\Repository\QueryFunction;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

final class CategoryTree extends NestedTreeRepository implements QueryFunction
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Category::class));
    }

    /**
     * @param Category|null $root
     *
     * @return array
     */
    public function __invoke(Category $root = null): array
    {
        $categories = $this
            ->createQueryBuilder('c')
            ->select(
                'c.id',
                'c.name',
                'c.lft',
                'c.lvl',
                'c.rgt'
            )
            ->orderBy('c.root, c.lft', 'ASC')
            ->getQuery()
            ->getArrayResult();

        return $this->buildTree($categories);
    }
}
