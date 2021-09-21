<?php

namespace App\Controller;

use App\Entity\Anketa;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    
    /**
     * @Route("/", name="home_page")
     */
    public function index(): Response
    {

        $user = $this->getUser();
        $anketa = $this->getDoctrine()
            ->getRepository(Anketa::class)
            ->findAll();

        $lats = array();
        $lngs = array();

        foreach ($anketa as $a) {
            array_push($lats, $a->getLat());
            array_push($lngs, $a->getLng());
        }
        
        if (isset($user)){
            

            if ($user->isVerified() == true){

                return $this->render('home_page/add.html.twig', [
                    'controller_name' => 'HomePageController',
                    'lats' => $lats,
                    'lngs' => $lngs,
                ]);
                
            }

            if ($user->IsVerified() == false){

                return $this->render('home_page/needverify.html.twig', [
                    'controller_name' => 'HomePageController',
                ]);

            }
        
        }else{

            return $this->render('add_anketa/index.html.twig', [
                'controller_name' => 'AddAnketaController',
            ]);

        }

    }

    
    /**
    * @Route("/add", methods={"POST", "GET"}, name="app_add")
    */
    public function add(Request $request)
    {
        
        if ($request->isMethod('POST')){

            $user = $this->getUser();
                    
            $anketa = new Anketa();

            $anketa->setUserId($user->getId());
            $anketa->setLat($_POST['lat']);
            $anketa->setLng($_POST['lng']);
            $anketa->setViensDu($_POST['1_2']);
            $anketa->setViensTrys($_POST['1_3']);
            $anketa->setViensKeturi($_POST['1_4']);
            $anketa->setViensPenki($_POST['1_5']);
            $anketa->setDuViens($_POST['2_1']);
            $anketa->setDuDu($_POST['2_2']);
            $anketa->setDuTrys($_POST['2_3']);
            $anketa->setDuKeturi($_POST['2_4']);
            $anketa->setTrysViens($_POST['3_1']);
            $anketa->setTrysViensSize($_POST['3_1_size']);
            $anketa->setTrysViensPastabos($_POST['3_1_pastabos']);
            $anketa->setTrysDu($_POST['3_2']);
            $anketa->setTrysDuPastabos($_POST['3_2_pastabos']);
            $anketa->setTrysTrys($_POST['3_3']);
            $anketa->setTrysTrysPastabos($_POST['3_3_pastabos']);
            $anketa->setTrysKeturi($_POST['3_4']);
            $anketa->setTrysKeturiPastabos($_POST['3_4_pastabos']);
            $anketa->setTrysPenki($_POST['3_5']);
            $anketa->setTrysPenkiPastabos($_POST['3_5_pastabos']);
            $anketa->setTrysSesi($_POST['3_6']);
            $anketa->setTrysSesiPastabos($_POST['3_6_pastabos']);
            $anketa->setTrysSeptyniViens($_POST['3_7_1']);
            $anketa->setTrysSeptyniViensKm($_POST['3_7_1_km']);
            $anketa->setTrysSeptyniDu($_POST['3_7_2']);
            $anketa->setTrysSeptyniDuKm($_POST['3_7_2_km']);
            $anketa->setTrysSeptyniTrys($_POST['3_7_3']);
            $anketa->setTrysSeptyniTrysKm($_POST['3_7_3_km']);
            $anketa->setTrysSeptyniKeturi($_POST['3_7_4']);
            $anketa->setTrysSeptyniKeturiKm($_POST['3_7_4_km']);
            $anketa->setTrysSeptyniPastabos($_POST['3_7_pastabos']);
            $anketa->setCreatedAt(new \DateTime('now'));
            $anketa->setUpdated(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($anketa);
            $em->flush();

            return $this->render('home_page/index.html.twig', [
                'controller_name' => 'HomePageController',
            ]);

        }else{
            return new Response(
                '<html><body>Neužpildyta anketa: <a href="/"><button>Grįžti</button></a></body></html>'
            );
        }

        
    }
    
}
