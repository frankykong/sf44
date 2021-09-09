<?php

namespace App\Listeners;

use App\Entity\Attachment;
use App\Entity\Article;
use App\Repository\AttachmentRepository;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use App\Services\AttachmentManager;
use Doctrine\ORM\EntityManagerInterface;


class ArticleListener
{
    /**
     * @var AttachmentRepository
     */
    private $attachmentRepository;

    /**
     * @var AttachmentManager
     */
    private $attachmentManager;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, AttachmentRepository $attachmentRepository, AttachmentManager $attachmentManager)
    {
        $this->entityManager = $entityManager;
        $this->attachmentRepository = $attachmentRepository;
        $this->attachmentManager = $attachmentManager;
    }

    public function preUpdate(Article $article, PreUpdateEventArgs $args)
    {
        if($args->hasChangedField('body'))
        {
//            $em = $args->getEntityManager();
//            /** @var AttachmentRepository $attachmentRepository */
//            $attachmentRepository = $em->getRepository(Attachment::class);

            $regex = '~/uploads/[a-zA-Z0-9]+\.\w+~';
            $matches = [];

            if (preg_match_all($regex, $args->getNewValue('body'), $matches) > 0 )
            {
                $fileNames = array_map(function ($match){
                    return basename($match);
                }, $matches[0]);

                $recordsToRemove = $this->attachmentRepository->findAttachmentsToRemove($fileNames, $article->getId());

                $filesNamesToRemove = [];
                /** @var Attachment $record */
                foreach ($recordsToRemove as $record)
                {
                    $filesNamesToRemove[] = $record->getFileName();
                    //remove the file from the server
                    $this->attachmentManager->removeAttachment($record->getFileName());
                }
                // remove the record from the db
                $this->attachmentRepository->removeAttachments($filesNamesToRemove);

            } else if ($article->getAttachments()->count() && $matches) {
                /** @var Attachment $record */
                foreach ($article->getAttachments() as $record)
                {
                    // remove the record from the db
//                    $entity = $this->entityManager->merge($record);
//                    $this->entityManager->remove($entity);
                    // remove the file from the server
                    $this->attachmentManager->removeAttachment($record->getFilename());
                }
            }
            $this->entityManager->flush();

//            $em->flush();

        };
    }

}