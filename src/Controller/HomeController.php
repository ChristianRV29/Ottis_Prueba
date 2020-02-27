<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /** 
     * @Route("/", name="index")
     */

    public function indexAction()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        
    }


    /** 
     * @Route("/home", name="home")
     */

    public function homeAction()
    {
        //La template index.html está encontrada en home
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        
    }

    /**
     *  @Route("/proyectos", name="proyectos")
     */
    public function proyectosAction()
    {

        return $this->render('home/proyectos.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
