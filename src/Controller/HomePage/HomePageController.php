<?php
/**
 * Created by PhpStorm.
 * User: thiba
 * Date: 24/09/2018
 * Time: 13:05
 */

namespace App\Controller\HomePage;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{

    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function homePage()
    {

        return $this->render('homePage/homePage.html.twig');
    }
}