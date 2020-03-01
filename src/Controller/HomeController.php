<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Proyecto;

class HomeController extends Controller
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
        
        //Capturar el repositorio de la tabla contra la BD
        $proyectoRepository = $this->getDoctrine()->getRepository(Proyecto::class);
        //Siendo la pagina principal solo mostraremos los mejores proyectos
        $proyectos = $proyectoRepository->findByTop(true);
        
        //La template index.html está encontrada en home
        
        return $this->render('home/index.html.twig',array('proyectos' => $proyectos));
        
        //return $this->render('home/index.html.twig', [    
            //'controller_name' => 'HomeController',
        //], array('proyectos'=>$proyectos));
        
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

    /**
     *  @Route("/proyecto/{id}", name="proyecto")
     */

    public function proyectoFunction($id = null)
    {

        if($id != null){

            $proyectoRepository = $this->getDoctrine()->getRepository(Proyecto::class);
            $proyecto = $proyectoRepository->find($id);

            return $this->render('home/proyecto.html.twig', 
            array("proyecto"=>$proyecto));
        }
        else {

            return $this->redirectToRoute('home');
        }
    }

    /**
     *  @Route("/actividades/{actividad}", name="actividades")
     */

    public function actividadesFunction($actividad="tipo")
    {       

        return $this->render('home/actividades.html.twig', 
        array("actividad"=>$actividad));
    }
}
