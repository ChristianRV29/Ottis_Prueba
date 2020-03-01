<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Proyecto;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * @Route("/gestionProyectos")
 */

class ProyectoController extends Controller
{

    /** 
     * @Route("/nuevoProyecto", name="nuevoProyecto")
     */

    public function nuevoProyectoAction()
    {
    
        $proyecto = new Proyecto();
        
        $formBuilder = $this->createFormBuilder($proyecto);
        $formBuilder -> add('nombre', TextType::class, array('label'=> 'Nombre del proyecto:'));
        $formBuilder -> add('descripcion', TextareaType::class, array('label'=> 'Descripción del proyecto: '));
        $formBuilder -> add('fecha_Inicio', DateTimeType::class , array('label'=> 'Fecha y hora de inicio:'));

        $formBuilder -> add('guardar',SubmitType::class, array('label' => 'Crear proyecto'));



        $form = $formBuilder->getForm();
       


        $proyectoRepository = $this->getDoctrine()->getRepository(Proyecto::class);
        
        $proyectos = $proyectoRepository->findAll();
        
       
        
        return $this->render('GestionProyectos/nuevoProyecto.html.twig',array('form' => $form->createView()));
        
    
        
    }

}