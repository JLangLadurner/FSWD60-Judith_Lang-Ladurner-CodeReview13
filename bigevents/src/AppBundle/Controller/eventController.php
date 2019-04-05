<?php

namespace AppBundle\Controller;

/*connect to entity for create - edit and delete*/
use AppBundle\Entity\events;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/*for each type of field*/

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class eventController extends Controller
{
    /**
     * @Route("/", name="index_event")
     */
    public function indexAction(Request $request)
    {
        $events = $this->getDoctrine()
      ->getRepository('AppBundle:events')
      ->findAll();


       return $this->render('events/index.html.twig', array(
        'events'=>$events));
       
    }
    /**
     * @Route("/admin", name="admin_event")
     */
    public function adminAction(Request $request)
    {
         $events = $this->getDoctrine()
      ->getRepository('AppBundle:events')
      ->findAll();


       return $this->render('events/admin.html.twig', array(
        'events'=>$events));
       
    }
    /**
     * @Route("/create", name="create_event")
     */
    public function createAction(Request $request)
    {
        $event = new events;

    $form = $this->createFormBuilder($event)
      ->add('eventName', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('eventDate', DateType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('eventTime', TimeType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('description', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('img', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('capacity', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('email', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('phoneNr', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('url', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
      ->add('eventType', ChoiceType::class, array('choices'=> array('music'=>'music','sport' => 'sport', 'movie' => 'movie','theater' => 'theater' ),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px'))) /*dont forget ',' between choices and attr*/
      ->add('save', SubmitType::class, array('label' => 'Create Event','attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))
      ->getForm(); /*dont forget arrow when calling the function*/

      $form->handleRequest($request);

      /*insert if function - or what should happen, wenn the form has been subitted*/

      /*dont forget to include the form in create...*/

      if ($form->issubmitted() && $form->isValid()) {
        /*Get Data*/

        $eventName = $form['eventName']->getData();
        $eventDate = $form['eventDate']->getData();
        $eventTime = $form['eventTime']->getData();
        $description = $form['description']->getData();
        $img = $form['img']->getData();
        $capacity = $form['capacity']->getData();
        $email = $form['email']->getData();
        $phoneNr = $form['phoneNr']->getData();
        $address = $form['address']->getData();
        $url = $form['url']->getData();
        $eventType = $form['eventType']->getData();

     

        //the set.. refer to setters in entity...

        $event->setEventName($eventName);
        $event->setEventDate($eventDate);
        $event->setEventTime($eventTime);
        $event->setDescription($description);
        $event->setImg($img);
        $event->setCapacity($capacity);
        $event->setEmail($email);
        $event->setPhoneNr($phoneNr);
        $event->setaddress($address);
        $event->setUrl($url);
        $event->setEventType($eventType);

        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        $this->addFlash(
                'notice',
                'Event added'
        );

        return $this->redirectToRoute('admin_event');
    }
    /*after or before including it in the create file don't forget to add the form view to $form(createView)*/
       return $this->render('events/create.html.twig', array(
        'form' => $form->createView()
       ));
    }
    /**
     * @Route("/edit/{id}", name="edit_event")
     */
    public function editAction($id, Request $request)
    {
         $event = $this->getDoctrine()
        ->getRepository('AppBundle:events')
        ->find($id);
        //copied from the 'create' and edited to fit...
       

        $event->setEventName($event->getEventName());
        $event->setEventDate($event->getEventDate());
        $event->setEventTime($event->getEventTime());
        $event->setDescription($event->getDescription());
        $event->setImg($event->getImg());
        $event->setCapacity($event->getCapacity());
        $event->setEmail($event->getEmail());
        $event->setPhoneNr($event->getPhoneNr());
        $event->setaddress($event->getAddress());
        $event->setUrl($event->getUrl());
        $event->setEventType($event->getEventType());
    
        /*copied form from create action*/
        $form = $this->createFormBuilder($event)
          ->add('eventName', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('eventDate', DateType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('eventTime', TimeType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('description', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('img', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('capacity', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('email', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('phoneNr', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('address', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('url', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px')))
          ->add('eventType', ChoiceType::class, array('choices'=> array('music'=>'music','sport' => 'sport', 'movie' => 'movie','theater' => 'theater' ),'attr' => array('class' => 'form-control', 'style' => 'margin-bottom: 15px'))) /*dont forget ',' between choices and attr*/
          ->add('save', SubmitType::class, array('label' => 'save','attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom: 15px')))
          ->getForm(); /*dont forget arrow when calling the function*/

          $form->handleRequest($request);

      /*insert if function - or what should happen, wenn the form has been subitted*/

      /*dont forget to include the form in edit...*/

      if ($form->issubmitted() && $form->isValid()) {
        /*Get Data*/

        $eventName = $form['eventName']->getData();
        $eventDate = $form['eventDate']->getData();
        $eventTime = $form['eventTime']->getData();
        $description = $form['description']->getData();
        $img = $form['img']->getData();
        $capacity = $form['capacity']->getData();
        $email = $form['email']->getData();
        $phoneNr = $form['phoneNr']->getData();
        $address = $form['address']->getData();
        $url = $form['url']->getData();
        $eventType = $form['eventType']->getData();

        $em = $this->getDoctrine()->getManager();
        //add this line
        $event = $em->getRepository('AppBundle:events')->find($id);

        

        $event->setEventName($eventName);
        $event->setEventDate($eventDate);
        $event->setEventTime($eventTime);
        $event->setDescription($description);
        $event->setImg($img);
        $event->setCapacity($capacity);
        $event->setEmail($email);
        $event->setPhoneNr($phoneNr);
        $event->setaddress($address);
        $event->setUrl($url);
        $event->setEventType($eventType);

        //doctrine Manager moved up
        //persist deleted
        $em->flush();

        $this->addFlash(
                'notice',
                'Event Updated'
        );
        return $this->redirectToRoute('admin_event');
      }

       return $this->render('events/edit.html.twig', array(
        'event'=>$event,
        'form'=>$form->createView()
       ));
    }
    /**
    * @Route("/details/{id}", name="details_event")
    */

   public function detailsAction($id)
   {
    
    $events = $this->getDoctrine()
        ->getRepository('AppBundle:events')
        ->find($id);


       return $this->render('events/details.html.twig', array(
        'events'=>$events
       ));


   }

   /**
    * @Route("/delete/{id}", name="car_delete")
    */

   public function deleteAction($id)
   {
        $em = $this->getDoctrine()->getManager();
        //add this line
        $event = $em->getRepository('AppBundle:events')->find($id);

        $em->remove($event);
        $em->flush();

        $this->addFlash(
                'notice',
                'Event Removed'
        );

        return $this->redirectToRoute('admin_event');

      }

      /**
    * @Route("/sort", name="sort_event")
    */

   public function listAction(Request $request)
   {
        $events = $this->getDoctrine()
        ->getRepository('AppBundle:events')
        ->findAll();


       return $this->render('events/sortby.html.twig', array(
        'events'=>$events
       ));
   }
}