<?php

namespace App\Controller;

use App\Entity\Anketa;
use App\Entity\User;
use phpDocumentor\Reflection\Types\Null_;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    /**
     * @Route("/profile/view/{id}", name="view")
     * @IsGranted("ROLE_USER")
     */
    public function index(int $id = null ): Response
    {
        $user_current = $this->getUser();

        if ($id) {
            $anketa = $this->getDoctrine()
                ->getRepository(Anketa::class)
                ->find($id);
            //visom anketom
            $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy(array('id' => $anketa->getUserId()));
        }

        //apsaugom nuo svetimų anketų peržiūros
        if ($user_current->getId() != $anketa->getuserId()){
            //return $this->redirectToRoute('app_login');
        }

        return $this->render('view/index.html.twig', [
            'controller_name' => 'ViewController',
            'a' => $anketa,
            'user' => $user,
        ]);
    }
}
