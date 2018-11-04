<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ActionItems;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $actionTypes = $this->getDoctrine()->getRepository(ActionItems::class)->findAll();
        dump($actionTypes);


        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'actionTypes' => $actionTypes
        ]);
    }
}
