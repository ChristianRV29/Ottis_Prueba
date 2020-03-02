<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuario;
use Symfony\Component\Form;
use App\Form\UsuarioType;

use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/gestionUsuarios")
 */

 class UsuarioController extends Controller{

    public function nuevoUsuarioAction(){

        $usuario = new Usuario();
        
        $form = $this->createForm(UsuarioType::class, $usuario);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){

                $usuario = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($usuario);
                $entityManager->flush();


                return $this->redirectToRoute('usuario',array('id'=> $usuario->getId()));

            }

            return $this->render('GestionUsuarios/nuevoUsuario.html.twig',array('form' => $form->createView()));
        }
    }
 }