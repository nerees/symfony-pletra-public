<?php

namespace App\Controller;

use App\Entity\Anketa;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     * @IsGranted("ROLE_USER")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        $anketa = $this->getDoctrine()
            ->getRepository(Anketa::class)
            ->findAll();

        if ($user->getAdmin() == 1){

            $lats = array();
            $lngs = array();

            foreach ($anketa as $a) {
                array_push($lats, $a->getLat());
                array_push($lngs, $a->getLng());
            }

            return $this->render('admin/index.html.twig', [
                'controller_name' => 'AdminController',
                'user' => $user,
                'anketa' => $anketa,
                'lats' => $lats,
                'lngs' => $lngs,
            ]);

        }else {
            return $this->redirectToRoute('profile');
        }


    }
}
