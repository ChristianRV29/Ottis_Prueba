<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Proyecto;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ProyectoType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder 
        -> add('nombre', TextType::class, array('label'=> 'Nombre del proyecto:'))
        -> add('descripcion', TextareaType::class, array('label'=> 'Descripción del proyecto: '))
        -> add('fecha_Inicio', DateTimeType::class , array('label'=> 'Fecha y hora de inicio:'))
        -> add('guardar',SubmitType::class, array('label' => 'Crear proyecto'));
    }
}

