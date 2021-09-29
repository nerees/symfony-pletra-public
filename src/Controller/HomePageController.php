<?php

namespace App\Controller;

use App\Entity\Anketa;
use App\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

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

        if (isset($user)) {


            if ($user->isVerified() == true) {

                return $this->render('home_page/add.html.twig', [
                    'controller_name' => 'HomePageController',
                    'lats' => $lats,
                    'lngs' => $lngs,
                ]);

            }

            if ($user->IsVerified() == false) {

                return $this->render('home_page/needverify.html.twig', [
                    'controller_name' => 'HomePageController',
                ]);

            }

        }

        return $this->render('add_anketa/index.html.twig', [
            'controller_name' => 'AddAnketaController',
        ]);

    }


    /**
     * @Route("/add", methods={"POST", "GET"}, name="app_add")
     */
    public function add(Request $request, LoggerInterface $logger, MailerInterface $mailer)
    {

        if ($request->isMethod('POST')) {

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

            //siusti emaila apie registruota anketa
            try {
                $this->sendEmails($anketa->getId(), $mailer);
            } catch (Exception $e) {
                $logger->error($e->getMessage());
            }

            return $this->render('home_page/index.html.twig', [
                'controller_name' => 'HomePageController',
            ]);

        } else {
            return new Response(
                '<html><body>Neužpildyta anketa: <a href="/"><button>Grįžti</button></a></body></html>'
            );
        }


    }

    public function sendEmails($id, $mailer)
    {
        if ($id) {

            $anketa = $this->getDoctrine()
                ->getRepository(Anketa::class)
                ->find($id);
            //visom anketom
            $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy(array('id' => $anketa->getUserId()));

            $html = $this->render('view/pdf.html.twig', [
                'controller_name' => 'ViewController',
                'a' => $anketa,
                'user' => $user,
            ])->getContent();

            $email = (new Email())
                ->from('demo@demo.com')
                ->to('test@demo.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Čia Market Plėtra - Nauja registruota anketa.')
                //->text('Sending emails is fun again!')
                ->html($html);


            if ($mailer->send($email)) {

                return true;

            } else {

                return false;

            }

        }

    }
}
