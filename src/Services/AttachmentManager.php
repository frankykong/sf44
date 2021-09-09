<?php

namespace App\Services;

use App\Entity\Attachment;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AttachmentManager
{

    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(ContainerInterface $container, EntityManagerInterface $entityManager)
    {
        $this->container = $container;
        $this->entityManager = $entityManager;
    }

    public function uploadAttachment(UploadedFile $file, $className, $id): array
    {
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

        $file->move(
            $this->getUploadDir(),
            $fileName
        );
        $attachment = new Attachment();
        $attachment->setFileName($fileName);
        $attachment->setPath( '/uploads/' . $fileName);

        $objectA = $this->entityManager->find($className, $id);

        $type = explode("\\", $className);

        if($type[2] === 'Article' )
        {
            $attachment->setArticle($objectA);
        }
        else if($type[2] === 'Lab')
        {
            $attachment->setLab($objectA);
        }
        $attachment->setType($type[2]);
        $objectA->addAttachment($attachment);
        $this->entityManager->persist($attachment);
        $this->entityManager->flush();

        return [
            'filename' => $fileName,
            'path' => '/uploads/' . $fileName
        ];

    }

    public function removeAttachment(?string $fileName)
    {
        if (!empty($fileName))
        {
            $fileSystem = new Filesystem();
            try {
                $fileSystem->remove(
                    $this->getUploadDir().$fileName
                );
            } catch (ORMException $e) {
            }
        }
    }

    public function getUploadDir()
    {
        return $this->container->getParameter('uploads_directory');
    }
}