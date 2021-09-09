<?php

namespace App\Controller;

use App\Entity\Article;
use App\Services\AttachmentManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttachmentController extends AbstractController
{
    /**
     * @var AttachmentManager
     */
    private $attachmentManager;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;


    public function __construct(AttachmentManager $attachmentManager, EntityManagerInterface $entityManager)
    {
        $this->attachmentManager = $attachmentManager;
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/attachment/{id}/{type}", name="attachment")
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function index(Request $request): Response
    {

        $className = 'App\\Entity\\' . ucfirst($request->get('type'));

       // $objectA = $this->entityManager->getReference('App\Entity\Article', 1);
        //$objectA = $this->entityManager->find($className, 2);
        //$this->assertInstanceOf('Doctrine\ORM\Proxy\Proxy', $objectA); // === true
        // this will trigger a query, loading the state that's configured to eager load
        // since the UnitOfWork already has a proxy, that proxy will be reused
        //$objectB = $entityManager->find('EntityName', 1);

        $uploadFile = $request->files->get('file');

        $fieUri = $this->attachmentManager->uploadAttachment($uploadFile, $className, $request->get('id'));

        return $this->json([
            'location' => $fieUri['path']
        ]);
    }
}
