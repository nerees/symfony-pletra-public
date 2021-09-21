<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AddAnketaController extends AbstractController
{
    /**
     * @Route("/add/anketa", name="add_anketa")
     */
    public function index(): Response
    {
        $user = $this->getUser();

        if (isset($user)) {

            return $this->render('add_anketa/index.html.twig', [
                'controller_name' => 'AddAnketaController',
            ]);
        }else{
            return $this->redirectToRoute('home_page');
        }
    }
}
