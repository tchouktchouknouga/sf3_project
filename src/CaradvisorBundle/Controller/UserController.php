<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Form\VehicleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('@Caradvisor/User/home.html.twig');
    }

    /**
     * @Route("/user/car/{user}", name="user_car")
     * @param User $user
     * @return Response
     * @param Request $request
     */
    public function carsAction(User $user,Request $request )
    {
        $vehicle = new Vehicle();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $vehicle->setUser($user);
            $em->persist($vehicle);
            $em->flush();
            //return $this->redirectToRoute('user_car');
        }
        return $this->render('@Caradvisor/User/car.html.twig',[
            'data' =>$user->getVehicles(),
            'alfa' =>$user->getLastName(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/profile/{user}", name="user_profile")
     * @param User $user
     * @return Response
     */
    public function profileAction(User $user)
    {
        return $this->render('@Caradvisor/User/profile.html.twig',[
            'user' => $user
        ]);
    }
    /**
     * @Route("/user/reviews/{user}", name="user_reviews")
     * @param User $user
     * @return Response
     */
    public function reviewsAction(User $user)
    {
       //$userRepository = $this->getDoctrine()->getRepository('CaradvisorBundle:User');
       //$data = $userRepository->getReviewUser($user->getId());
       return $this->render('@Caradvisor/User/reviews.html.twig', [
           'data' => $user->getReviewRepairs(),
           'beta' => $user->getReviewBuys(),
       ]);
    }

    /**
     * @Route("/user/settings/{user}", name="user_settings")
     * @param User $user
     * @return Response
     */
    public function settingsAction(User $user)
    {
        return $this->render('@Caradvisor/User/settings.html.twig',[
            'user' => $user
        ]);
    }

    /**
     * @Route("/user/settings/password/{user}", name="user_password")
     * @param User $user
     * @return Response
     */
    public function passwordAction(User $user)
    {
        return $this->render('@Caradvisor/User/password.html.twig', [
            'user' => $user
        ]);
    }
}