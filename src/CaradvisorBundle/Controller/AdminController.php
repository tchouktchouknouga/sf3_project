<?php

namespace CaradvisorBundle\Controller;

use CaradvisorBundle\Entity\Admin;
use CaradvisorBundle\Form\AdminType;
use CaradvisorBundle\Entity\ReviewBuy;
use CaradvisorBundle\Entity\ReviewRepair;
use CaradvisorBundle\Entity\User;
use CaradvisorBundle\Entity\Vehicle;
use CaradvisorBundle\Entity\Answer;
use CaradvisorBundle\Entity\Pro;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends Controller
{
    /**
     * @Route ("/admin", name="admin")
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@Caradvisor/Admin/Default/test.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
        /*return $this->render('@Caradvisor/Admin/Default/test.html.twig', [
        ]);*/
    }

    /**
     * @Route("/admin/dashboard", name="dashboard")
     */
    public function viewDashboard()
    {
        return $this->render('@Caradvisor/Admin/Default/home.html.twig');
    }

    /**
     * @Route("/register", name="admin_register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function registerAction(Request $request)
    {
        $admin = new Admin();
        $form = $this->createForm(AdminType::class, $admin);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $password = $this->get('security.password_encoder')
                ->encodePassword($admin, $admin->getPlainPassword());
            $admin->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin');
        }
        return $this->render(
            '@Caradvisor/Admin/Default/registerAdmin.html.twig',
            array('form' => $form->createView())
        );
    }
    /**
     * @Route ("/admin/reviews", name="admin_reviews")
     * @return Response
     */
    public function adminReviewsAction()
    {
        $reviewsBuy = $this->getDoctrine()->getRepository('CaradvisorBundle:ReviewBuy')->findByIsActive(false);
        $reviewsRepair = $this->getDoctrine()->getRepository('CaradvisorBundle:ReviewRepair')->findByIsActive(false);
        return $this->render('@Caradvisor/Admin/Default/adminReviews.html.twig', [
            'reviewsBuy' => $reviewsBuy,
            'reviewsRepair' => $reviewsRepair
        ]);
    }

    /**
     * @Route("/admin/reviews/activate-review-buy/{reviewBuy}", name="activate_review_buy")
     * @param ReviewBuy $reviewBuy
     * @return Response
     */
    public function activateBuyAction(ReviewBuy $reviewBuy)
    {
        $em = $this->getDoctrine()->getManager();
        $reviewBuy->setIsActive(true);
        $em->persist($reviewBuy);
        $em->flush();
        return $this->redirectToRoute("admin_reviews", [
            'reviewBuy' => $reviewBuy
        ]);

    }

    /**
     * @Route("/admin/reviews/activate-review-repair/{reviewRepair}", name="activate_review_repair")
     * @param ReviewRepair $reviewRepair
     * @return Response
     */
    public function activateRepairAction(ReviewRepair $reviewRepair)
    {
        $em = $this->getDoctrine()->getManager();
        $reviewRepair->setIsActive(true);
        $em->persist($reviewRepair);
        $em->flush();
        return $this->redirectToRoute("admin_reviews", [
            'reviewRepair' => $reviewRepair
        ]);

    }

    /**
     * @Route("/admin/reviews/detail-buy/{reviewBuy}", name="detail_review_buy")
     * @param ReviewBuy $reviewBuy
     * @return Response
     */
    public function detailReviewBuyAction(ReviewBuy $reviewBuy)
    {
        return $this->render('@Caradvisor/Admin/Default/adminDetailReviewBuy.html.twig', [
            'reviewBuy' => $reviewBuy
        ]);

    }

    /**
     * @Route("/admin/reviews/detail-repair/{reviewRepair}", name="detail_review_repair")
     * @param ReviewRepair $reviewRepair
     * @return Response
     */
    public function detailReviewRepairAction(ReviewRepair $reviewRepair)
    {
        return $this->render('@Caradvisor/Admin/Default/adminDetailReviewRepair.html.twig', [
            'reviewRepair' => $reviewRepair
        ]);

    }

    /**
     * @Route("/admin/users", name="admin_users")
     */
    public function listUsersAction()
    {
        $users = $this->getDoctrine()->getRepository('CaradvisorBundle:User')->findAll(array('lastName' => 'ASC'));
//        $data = $repo->getUsersByLastName();
            return $this->render('@Caradvisor/Admin/Default/adminListUsers.html.twig',[
               'users' => $users
        ]);

    }
}
