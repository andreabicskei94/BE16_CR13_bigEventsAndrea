<?php

namespace App\Form;

use App\Entity\Events;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Controller\EventController;


use Symfony\Component\Form\FormBuilderInterface;


class CreateType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
      $builder
    ->add("name", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("datetime", DateTimeType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("description", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("picture", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("capacity", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("contact_email", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("phonenumber", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("cityname", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("zip", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("address", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("url", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add('fk_type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'typename',
            ]) 

            
            ->add("save", SubmitType::class, array('attr' => array("class" => "btn btn-success", "style" => "margin-bottom: 15px; margin-top: 15px;"), "label" => "Submit"))->getForm();
        }

  public function configureOptions(OptionsResolver $resolver): void
  {
      $resolver->setDefaults([
          'events' => Events::class,
      ]);
  }
}