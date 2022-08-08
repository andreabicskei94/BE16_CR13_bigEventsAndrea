<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type;
use App\Entity\Events;
use App\Form\EntityType;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\CreateType;




class EventController extends AbstractController
{
    #[Route('/', name: 'event')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $events = $doctrine ->getRepository(Events::class)->findAll();

    // dd($events); - works!
        return $this->render('event/index.html.twig', [
          "events" => $events
        ]);
    }


    #[Route('/create', name: 'event-create')]
    public function create(ManagerRegistry $doctrine, Request $request): Response
    {
        $events = new Events();
        $form = $this-> createForm(CreateType::class,$events);
        
        $form->handleRequest($request);
    

        
        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form["name"]->getData();
            $datetime = $form["datetime"]->getData();
            $description = $form["description"]->getData();
            $picture = $form["picture"]->getData();
            $capacity = $form["capacity"]->getData();
            $contact_email = $form["contact_email"]->getData();
            $phonenumber = $form["phonenumber"]->getData();
            $cityname = $form["cityname"]->getData();
            $zip = $form["zip"]->getData();
            $address = $form["address"]->getData();
            $url = $form["url"]->getData();
            $type = $form["typename"]->getData();
           



            $events->setName($name);
            $events->setDatetime($datetime);
            $events->setDescription($description);
            $events->setPicture($picture);
            $events->setCapacity($capacity);
            $events->getContactEmail($contact_email);
            $events->setPhonenumber($phonenumber);
            $events->setCityname($cityname);
            $events->setZip($zip);
            $events->setAddress($address);
            $events->setUrl($url);
            $events->setFkType($type);
           

            $em = $this->$doctrine()->getManager();

            $em->persist($events);
            $em->flush();

            $this->addFlash('notice', 'Event added');

            return $this->redirectToRoute('events');
        }

        return $this->render('event/create.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/details/{id}', name: 'event-details')]
    public function details($id, ManagerRegistry $doctrine): Response
    {

        $events = $doctrine->getRepository(Events::class)->find($id);
        return $this->render('event/details.html.twig', [
            "events" => $events
        ]);
    }
    #[Route('/delete/{id}', name: 'event-delete')]
    public function delete($id, ManagerRegistry $doctrine): Response
    {


        $em = $this->$doctrine()->getManager();
        $event = $em->getRepository(Events::class)->find($id);
        $em->remove($event);
        $em->flush();

        $this->addFlash("notice", "Event removed");

        return $this->redirectToRoute("event");
    }


    #[Route('/edit/{id}', name: 'event-edit')]
    public function  edit($id, Request $request, ManagerRegistry $doctrine): Response
    {

        $events = $this->$doctrine->getRepository(Events::class)->find($id);
        $form = $this->createFormBuilder($events)
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

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form["name"]->getData();
            $datetime = $form["datetime"]->getData();
            $description = $form["description"]->getData();
            $picture = $form["picture"]->getData();
            $capacity = $form["capacity"]->getData();
            $contanct_email = $form["contact_email"]->getData();
            $phonenumber = $form["phonenumber"]->getData();
            $cityname = $form["cityname"]->getData();
            $zip = $form["zip"]->getData();
            $address = $form["address"]->getData();
            $url = $form["url"]->getData();



            $events->setName($name);
            $events->setDatetime($datetime);
            $events->setDescription($description);
            $events->setPicture($picture);
            $events->setCapacity($capacity);
            $events->setContactEmail($contanct_email);
            $events->setPhonenumber($phonenumber);
            $events->setCityname($cityname);
            $events->setZip($zip);
            $events->setAddress($address);
            $events->setUrl($url);

            $em = $this->$doctrine()->getManager();
            $em->persist($events);
            $em->flush();


            $this->addFlash('notice', 'Event edited');

            return $this->redirectToRoute('events');
        }

        return $this->render('event/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }




    #[Route('/music', name: 'event-music')]
    public function music($doctrine): Response
    {

        $events = $doctrine->getRepository("App:Events")->findBy(["fk_type" => "1"]);
        return $this->render("event/music.html.twig", array("events" => $events));
    }


    #[Route('/movie', name: 'event-movie')]
    public function movie($doctrine): Response
    {

        $events = $this->$doctrine->getRepository("App:Events")->findBy(["fk_type" => "4"]);
        return $this->render("event/movie.html.twig", array("events" => $events));
    }

    #[Route('/sport', name: 'event-sport')]
    public function sport($doctrine): Response
    {

        $events = $this->$doctrine->getRepository("App:Events")->findBy(["fk_type" => "2"]);
        return $this->render("event/sport.html.twig", array("events" => $events));
    }
    #[Route('/theater', name: 'event-theater')]
    public function filter($doctrine): Response
    {

        $events = $this->$doctrine->getRepository("App:Events")->findBy(["fk_type" => "3"]);
        return $this->render("event/theater.html.twig", array("events" => $events));
    }
}
