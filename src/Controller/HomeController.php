<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Proyecto;
use App\Entity\Usuario;

class HomeController extends Controller
{

    /** 
     * @Route("/", name="index")
     */

    public function indexAction()
    {


        $proyectoRepository = $this->getDoctrine()->getRepository(Proyecto::class);
        
        $proyectos = $proyectoRepository->findByTop(true);
        
        return $this->render('home/index.html.twig',array('proyectos' => $proyectos));
        
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

        $proyectoRepository = $this->getDoctrine()->getRepository(Proyecto::class);
        $proyectos = $proyectoRepository->findAll();

        return $this->render('home/proyectos.html.twig', 
        array('proyectos'=>$proyectos));
    
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
     *  @Route("/usuarios", name="usuarios")
     */
    public function usuariosAction()
    {

        $usuarioRepository = $this->getDoctrine()->getRepository(Usuario::class);
        $usuarios = $usuarioRepository->findAll();

        return $this->render('home/usuarios.html.twig', 
        array('usuarios'=>$usuarios));
    
    }

    /**
     *  @Route("/usuario/{id}", name="usuario")
     */

    public function usuarioFunction($id = null)
    {

        if($id != null){

            $usuarioRepository = $this->getDoctrine()->getRepository(Usuario::class);
            $usuario = $usuarioRepository->find($id);

            return $this->render('home/usuario.html.twig', 
            array("usuario"=>$usuario));

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
