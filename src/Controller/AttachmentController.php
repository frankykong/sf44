<?php

namespace App\Controller;

use App\Entity\Article;
use App\Services\AttachmentManager;
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


    public function __construct(AttachmentManager $attachmentManager)
    {
        $this->attachmentManager = $attachmentManager;

    }
    /**
     * @Route("/attachment/{id}", name="attachment")
     * @param Request $request
     * @param Article $article
     * @return Response
     */
    public function index(Request $request, Article $article): Response
    {

        $uploadFile = $request->files->get('file');

        $fieUri = $this->attachmentManager->uploadAttachment($uploadFile, $article);

        return $this->json([
            'location' => $fieUri['path']
        ]);
    }
}
