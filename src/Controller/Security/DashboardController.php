<?php
/**
 * Created by PhpStorm.
 * User: thiba
 * Date: 23/11/2017
 * Time: 13:23
 */

namespace App\Controller\Security;



use App\Entity\User\Member;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/profil/{username}", name="view_profile", methods={"GET"})
     * @Security("has_role('ROLE_USER')")
     */
    public function viewProfileAction(Member $user)
    {
        $this->denyAccessUnlessGranted('view', $user);

        return $this->render('security/dashboard.html.twig', array(
            'user' => $user,
        ));

    }

}