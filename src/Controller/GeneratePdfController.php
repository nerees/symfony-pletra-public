<?php

namespace App\Controller;

use App\Entity\Anketa;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Mpdf;

class GeneratePdfController extends AbstractController
{
    /**
     * @Route("/profile/generate/pdf/{id}", name="generate_pdf")
     * @IsGranted("ROLE_USER")
     */
    public function index(int $id = null): Response
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

            $mpdf = new Mpdf\Mpdf();
            $html = $this->render('view/pdf.html.twig', [
                'controller_name' => 'ViewController',
                'a' => $anketa,
                'user' => $user,
            ])->getContent();

            $mpdf->setBasePath('/');
            $mpdf->WriteHTML($html);
            $filename = "Anketa_pletra_" . $id . ".pdf";
            $mpdf->Output($filename, "I");

        }

        return $this->render('generate_pdf/index.html.twig', [
            'controller_name' => 'GeneratePdfController',
        ]);
    }
}
