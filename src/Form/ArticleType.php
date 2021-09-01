<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' =>[
                    'placeholder' => '输入标题',
                    'class' => 'title'
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => 'App\Entity\Category'
            ] )
            ->add('tagIds')
            ->add('body', TextareaType::class, [
                'attr' =>[
                    'placeholder' => '输入内容'
                ]
            ])
            ->add('thumbnailSmall')
            ->add('thumbnailBig')
            ->add('status')
            ->add('hits')
            ->add('createdTime')
            ->add('updateTime')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
