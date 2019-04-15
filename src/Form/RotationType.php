<?php

namespace App\Form;

use App\Entity\Rotation;
use App\Entity\Zone;
use App\Entity\Legume;
use App\Entity\Planche;
use App\Entity\Subarea;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RotationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('zone', EntityType::class, [
                'class' => 'App\Entity\Zone',
                'placeholder' => 'Selectionnez une Zone',
            ])
            ->add('legume', EntityType::class, [
                'class' => 'App\Entity\Legume',
                'placeholder' => 'Selectionnez un Legume',
            ])
            ->add('tache', EntityType::class, [
                'class' => 'App\Entity\Tache',
                'placeholder' => 'Selectionnez une Tache',
            ])
            ->add('comment')
            ->add('amount')
        
        ;
        $builder->get('legume')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
              $form = $event->getForm();
              $this->addVarieteField($form->getParent(), $form->getData());
            }
        );

        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
                $data = $event->getData();
                $legume = $data->getLegume();
                $form = $event->getForm();
                if ($legume) {
                    // On récupère la variete
                    $variete = $legume->getVariete();
                    // On crée le champs supplémentaires
                    $this->addVarieteField($form, $legume);
                    // On set les données
                    $form->get('variete')->setData($variete);
                } else {
                    // On crée les 2 champs en les laissant vide (champs utilisé pour le JavaScript)
                    $this->addVarieteField($form, null);
                }
            }
        );

        $builder->get('zone')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm();
                $this->addSubareaField($form->getParent(), $form->getData());
                }
        );
    
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function (FormEvent $event) {
              $data = $event->getData();
              $zone = $data->getZone();
              $form = $event->getForm();
              if ($zone) {
                // On récupère le département et la région
                $subarea = $zone->getSubareas();
                $planche = $subarea->getPlanche();
                // On crée les 2 champs supplémentaires
                $this->addSubareaField($form, $subarea);
                $this->addPlancheField($form, $planche);
                // On set les données
                $form->get('subarea')->setData($subarea);
                $form->get('planche')->setData($planche);
              } else {
                // On crée les 2 champs en les laissant vide (champs utilisé pour le JavaScript)
                $this->addSubareaField($form, null);
                $this->addPlancheField($form, null);
              }
            }
        );

    }

    private function addVarieteField(FormInterface $form, ?Legume $legume)
    {
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'variete',
            EntityType::class,
            null,
            [
            'class'           => 'App\Entity\Variete',
            'placeholder'     => $legume ? 'Sélectionnez votre variete' : 'Sélectionnez votre legume pour la variété',
            'required'        => false,
            'auto_initialize' => false,
            'choices'         => $legume ? $legume->getVariete() : []
            ]
        );
        $form->add($builder->getForm());
    }

    private function addSubareaField(FormInterface $form, ?Zone $zone)
    {
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'subarea',
            EntityType::class,
            null,
            [
            'class'           => 'App\Entity\Subarea',
            'placeholder'     => $zone ? "Sélectionnez votre sous-zone ": 'Sélectionnez votre zone',
            'required'        => false,
            'auto_initialize' => false,
            'choices'         => $zone ? $zone->getSubareas() : []
            ]
        );

        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
              $form = $event->getForm();
              $this->addPlancheField($form->getParent(), $form->getData());
            }
        );
    
        $form->add($builder->getForm());
    }

    private function addPlancheField(FormInterface $form, ?Subarea $subarea)
    {
        $form->add('planche', EntityType::class, [
            'class'       => 'App\Entity\Planche',
            'placeholder' => $subarea ? 'Sélectionnez votre planche' : 'Sélectionnez votre sous-zone pour une planche',
            'choices'     => $subarea ? $subarea->getPlanche() : []
        ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rotation::class,
        ]);
    }
}
