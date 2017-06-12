<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Contact;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $reviews = $this->getDoctrine()->getRepository('CaradvisorBundle:Review')->findAll();
        return $this->render('@Caradvisor/Default/home.html.twig', [
            'reviews' => $reviews,
        ]);
    }

    /**
     * @Route("/results", name="results")
     */
    public function resultAction()
    {
        return $this->render('@Caradvisor/Default/results.html.twig');
    }

    /**
     * @Route("/info", name="info")
     */
    public function infoAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('CaradvisorBundle:ReviewBuy')
        ;

        $listReviewsBuy = $repository->getReviewBuys('r');

        foreach ($listReviewsBuy as $reviewBuy) {
            echo $reviewBuy->getId();
        }

        return $this->render('@Caradvisor/Default/info.html.twig',
            array(
                'listReviewsBuy' => $listReviewsBuy
            ));
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/contact", name="contact")
     *
     */
    public function addcontactAction(Request $request)
    {
        $contact = new Contact();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('home');

        }
        return $this->render('@Caradvisor/Default/contact.html.twig', [
            'form'  =>  $form->createView(),
        ]);
    }

    /**
     * @Route("/legal", name="legal")
     */
    public function legalAction()
    {
        return $this->render('@Caradvisor/Default/legal.html.twig');
    }

    /**
     * @Route("/cgu", name="cgu")
     */
    public function cguAction()
    {
        return $this->render('@Caradvisor/Default/cgu.html.twig');
    }
}
