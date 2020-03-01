<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Proyecto;
use Symfony\Component\Form;
use App\Form\ProyectoType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/gestionProyectos")
 */

class ProyectoController extends Controller
{

    /** 
     * @Route("/nuevoProyecto", name="nuevoProyecto")
     */

    public function nuevoProyectoAction(Request $request)
    {
        $proyecto = new Proyecto();
        
        $form = $this->createForm(ProyectoType::class, $proyecto);

        //Recogemos la información
        $form->handleRequest($request);

        //Comprobamos si la informacion es valida con isValid y si se envió información
        if($form->isSubmitted()){
             if($form->isValid()){

                //Rellenamos el entity Proyecto
                $proyecto = $form->getData();
                
                $proyecto->setTop(false);
                $proyecto->setImagen("");
                //$proyecto->setFechaFinalizacion(null);
                //Almacenamos el proyecto
            
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($proyecto);
                $entityManager->flush();

                return $this->redirectToRoute('proyecto',array('id'=> $proyecto->getId()));
        }
    }

        return $this->render('GestionProyectos/nuevoProyecto.html.twig',array('form' => $form->createView()));
        
    }

}