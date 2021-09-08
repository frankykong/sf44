<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\CategoryTree;


/**
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="category_index", methods={"GET"})
     * @param CategoryRepository $categoryRepository
     * @param Category $category
     * @return Response
     */
    public function index(CategoryRepository $categoryRepository, CategoryTree $categoryTree): Response
    {
        //$tree = new CategoryTree($entityManager);

        dump($categoryTree());

        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
            'active' => 'category'
        ]);
    }

//    /**
//     * @Route("/test", name="test", methods={"GET"})
//     * @param EntityManagerInterface $entityManager
//     * @return Response
//     */
//    public function test(EntityManagerInterface $entityManager)
//    {
//        $parent = new Category('父级别');
//        $entityManager->persist($parent);
//        $child = new Category('子级别A');
//        $child->setParent($parent);
//        $entityManager->persist($child);
//        $entityManager->flush();
//        return new Response(sprintf('Parent category record created with id %d an child Category record create with id %d', $parent->getId(), $child->getId() ));
//
//    }

    /**
     * @Route("/test", name="test", methods={"GET"})
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function test(EntityManagerInterface $em, CategoryRepository $categoryRepository)
    {
        $food = new Category();
        $food->setName('Food');

        $fruits = new Category();
        $fruits->setName('Fruits');
        $fruits->setParent($food);

        $vegetables = new Category();
        $vegetables->setName('Vegetables');
        $vegetables->setParent($food);

        $carrots = new Category();
        $carrots->setName('Carrots');
        $carrots->setParent($vegetables);

        $em->persist($food);
        $em->persist($fruits);
        $em->persist($vegetables);
        $em->persist($carrots);
        $em->flush();

//        $food = new Category();
//        $food->setName('Food');
//
//        $fruits = new Category();
//        $fruits->setName('Fruits');
//
//        $vegetables = new Category();
//        $vegetables->setName('Vegetables');
//
//        $carrots = new Category();
//        $carrots->setName('Carrots');
//
//        $treeRepository = new NestedTreeRepository($em, $categoryRepository);
//
//        $treeRepository
//            ->persistAsFirstChild($food)
//            ->persistAsFirstChildOf($fruits, $food)
//            ->persistAsLastChildOf($vegetables, $food)
//            ->persistAsNextSiblingOf($carrots, $fruits);
//
//        $em->flush();
//
//        return new Response(sprintf('Parent category record created with id %d an child Category record create with id %d', $food->getId(), $fruits->getId() ));

    }

    /**
     * @Route("/new", name="category_new", methods={"GET","POST"})
     * @param Request $request
     * @param CategoryTree $categories
     * @return Response
     */
    public function new(Request $request, CategoryTree $tree): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);

//            $repo = $entityManager->getRepository($category);
//            $entityManager->clear();
//            $repo->verify();
//            $repo->recover();

            $entityManager->flush();

            $this->addFlash('info','添加成功！');

            return $this->redirectToRoute('category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('category/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
            'active' => 'category'
        ]);
    }

    /**
     * @Route("/{id}", name="category_show", methods={"GET"})
     */
    public function show(Category $category): Response
    {
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'active' => 'category'
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Category $category): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('info','更新成功！');

            return $this->redirectToRoute('category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_delete", methods={"POST"})
     */
    public function delete(Request $request, Category $category): Response
    {
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_index', [], Response::HTTP_SEE_OTHER);
    }
}
